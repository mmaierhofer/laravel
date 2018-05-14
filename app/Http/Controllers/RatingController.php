<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;
use App\Rating;

class RatingController extends Controller
{
    public function index($book_id) {

        $rating = Rating::with(['book', 'user'])
            ->where('book_id',$book_id)
            ->get();
        return $rating;
    }

    public function save(Request $request) : JsonResponse
    {

        $request = $this->parseRequest($request);

        /**
         *  use a transaction for saving model including relations
         * if one query fails, complete SQL statements will be rolled back
         */
        DB::beginTransaction();
        try {
            $rating = Rating::create($request->all());
            $book = $rating->book;
            DB::commit();
            $bc = new BookController();
            $bc->updateRatings($book->isbn);



            return response()->json($rating, 201);
        }catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("saving rating failed: " . $request, 420);
        }
    }

    public function update(Request $request, string $id) : JsonResponse
    {

        DB::beginTransaction();
        try {
            $rating = Rating::all()
                ->where('id', $id)->first();
            if ($rating != null) {
                $request = $this->parseRequest($request);
                $rating->update($request->all());
            }
            DB::commit();
            // return a vaild http response
            return response()->json($rating, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("updating rating failed: " . $e->getMessage(), 420);
        }
    }

    public function delete(string $id) : JsonResponse
    {
        $rating = Rating::where('id', $id)->first();
        if ($rating != null) {
            $rating->delete();
        }
        else
            throw new \Exception("rating couldn't be deleted - it does not exist");
        return response()->json('rating (' . $id . ') successfully deleted', 200);

    }

    private function parseRequest(Request $request) : Request {
        // get date and convert it - its in ISO 8601, e.g. "2018-01-01T23:00:00.000Z"
        $date = new \DateTime($request->published);
        $request['published'] = $date;
        return $request;
    }
}
