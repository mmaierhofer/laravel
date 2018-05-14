<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*
         * Book 1
         */

        $user = App\User::all()->first();

        DB::table('books')->insert([
           'title' => 'Das Mädchen am Strand',
            'isbn' => '9781503901445',
            'subtitle' => 'Die Inselkommissarin 2',
            'rating' => 4.5,
            'description' => 'Hauptkommissarin Lena Lorenzen begleitet die groß angelegte Suchaktion 
                                nach einem vierzehnjährigen Mädchen auf der nordfriesischen Insel Föhr. 
                                Die vermisste Maria Logener stammt aus einer ultrareligiösen Familie und 
                                wird von allen als ungewöhnlich reif für ihr Alter beschrieben. Am zweiten 
                                Tag der Suche wird sie mit aufgeschnittenen Pulsadern an einem einsamen 
                                Strandabschnitt gefunden.
                              Schnell entsteht bei Lena und ihrem jungen Kollegen Johann Grasmann 
                              der Verdacht, dass es sich nicht um Suizid handelt. Marias Eltern 
                              verhalten sich äußerst unkooperativ, doch sie sind nicht die einzigen, 
                              die scheinbar etwas zu verbergen haben.
                              Erst nach und nach dringen die Kommissare tiefer in das Leben des jungen
                               Mädchens und ihre Geheimnisse ein. Lena ist überzeugt, dass darin der 
                               Schlüssel zur Lösung des Falles liegt.
                               Neben der beruflichen Herausforderung steht Lena privat vor schwierigen
                                Entscheidungen: Entschließt sie sich für ein gemeinsames Leben mit 
                                Erck, ihrem Jugendfreund, und was würde ein Umzug nach Amrum für ihre 
                                Arbeit beim LKA bedeuten? Und kann sie ihrem Vater verzeihen, den 
                                sie seit vierzehn Jahren nicht mehr gesehen hat?',
            'published' => new DateTime(),
            'user_id' => $user->id,
            'price' => 5.99,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        $book = App\Book::all()->where('isbn','9781503901445')->first();
        $authors = App\Author::all()->where('id',1);

        foreach ($authors as $author){
            $book->authors()->save($author);
        }
        $book->save();
        $ratings = App\Rating::all()->where('book_id',1);

        foreach ($ratings as $rating) {
            $book->ratings()->save($ratings);
        }
        $book->save();

        DB::table('images')->insert([
            'title' => 'Das Mächden am Strand',
            'url' => 'https://images-eu.ssl-images-amazon.com/images/I/51Oy%2BzRcytL.jpg',
            'book_id' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        /*
         * Book 2
         */


        DB::table('books')->insert([
            'title' => 'So dunkel die Angst',
            'isbn' => '9781544982571',
            'subtitle' => 'Thriller',
            'rating' => 4.5,
            'description' => 'Ein mysteriöser Entführungsfall stellt Fabian Prior und Thomas Wendtner vor ein Rätsel. Von einem 
            angeblichen Kinobesuch mit Freunden kehrte die sechzehnjährige Sophie nicht wieder nach Hause zurück. Jahre später 
            steht sie plötzlich völlig verwahrlost vor der Tür ihrer Eltern. Offensichtlich konnte sie ihrem Peiniger nur knapp 
            entkommen. Doch etwas scheint an ihrer Geschichte nicht zu stimmen. Was verschweigt sie den Ermittlern? Je intensiver
             sich Fabian und Thomas mit dem Fall beschäftigen, desto tiefer erscheinen die Abgründe vor ihnen. 
            Der zweite Fall für Fabian Prior und Thomas Wendtner - ein Psychothriller der Bestseller-Autorin Melisa Schwermer, den 
            Sie nicht mehr aus der Hand legen können.',
            'published' => new DateTime(),
            'user_id' => $user->id,
            'price' => 5.99,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        $book = App\Book::all()->where('isbn','9781544982571')->first();
        $authors = App\Author::all()->where('id',2);

        foreach ($authors as $author){
            $book->authors()->save($author);
        }
        $book->save();

        $ratings = App\Rating::all()->where('book_id',2);

        foreach ($ratings as $rating) {
            $book->ratings()->save($ratings);
        }
        $book->save();


        //add images


        DB::table('images')->insert([
            'title' => 'So dunkel die Angst',
            'url' => 'https://images-eu.ssl-images-amazon.com/images/I/51jwkmvGaAL._SY346_.jpg',
            'book_id' => 2,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);


        /*
         * Book 3
         */

        DB::table('books')->insert([
            'title' => 'Die Tyrannei des Schmetterlings',
            'isbn' => '9783462050844',
            'subtitle' => 'Roman',
            'rating' => 2.5,
            'description' => 'Die Tyrannei des Schmetterlings« - Frank Schätzings atemberaubender neuer Thriller über eines 
            der brisantesten Themen unserer Zeit: künstliche Intelligenz.
            Kalifornien, Sierra Nevada. Luther Opoku, Sheriff der verschlafenen Goldgräberregion Sierra in Kaliforniens 
            Bergwelt, hat mit Kleindelikten, illegalem Drogenanbau und steter Personalknappheit zu kämpfen. Doch der Einsatz an 
            diesem Morgen ändert alles. Eine Frau ist unter rätselhaften Umständen in eine Schlucht gestürzt. Unfall? Mord? 
            Die Ermittlungen führen Luther zu einer Forschungsanlage, einsam gelegen im Hochgebirge und betrieben von der 
            mächtigen Nordvisk Inc., einem Hightech-Konzern des zweihundert Meilen entfernten Silicon Valley. Zusammen mit 
            Deputy Sheriff Ruth Underwood gerät Luther bei den Ermittlungen in den Sog aberwitziger Ereignisse und beginnt 
            schon bald an seinem Verstand zu zweifeln. Die Zeit selbst gerät aus den Fugen. Das Geheimnis im Berg führt ihn 
            an die Grenzen des Vorstellbaren – und darüber hinaus.',
            'published' => new DateTime(),
            'user_id' => 1,
            'price' => 26.99,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        $book = App\Book::all()->where('isbn','9783462050844')->first();
        $authors = App\Author::all()->where('id',3);

        foreach ($authors as $author){
            $book->authors()->save($author);
        }
        $book->save();

        $ratings = App\Rating::all()->where('book_id',3);

        foreach ($ratings as $rating) {
            $book->ratings()->save($ratings);
        }
        $book->save();


        //add images


        DB::table('images')->insert([
            'title' => 'Die Tyrannei des Schmetterlings',
            'url' => 'https://images-eu.ssl-images-amazon.com/images/I/61jiiTlnLJL.jpg',
            'book_id' => 3,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);


        /*
         * Book 4
         */

        DB::table('books')->insert([
            'title' => 'Tod am Deich. Ostfrieslandkrimi',
            'isbn' => '9783462950844',
            'subtitle' => 'Kripo Greetsiel ermittelt 1',
            'rating' => 5,
            'description' => 'Hauptkommissar Tammo Anders traut seinen Augen kaum. Durch Zufall entdeckt er eine Leiche, 
            direkt am Deich in Greetsiel! Bei dem Toten handelt es sich um Folkert Petersen, einen der angesehensten Teehändler 
            der Region. Einen Tag später taucht ausgerechnet Enno Duwe im Ort wieder auf. Er hatte sich als junger Mann in 
            Greetsiel viele Feinde gemacht und war vor 25 Jahren verschwunden. Und seit jenem Tag ist auch Tina Petersen, die 
            Tochter des Ermordeten, wie vom Erdboden verschluckt... Kann das alles ein Zufall sein, oder ist Enno in den Mord an 
            Folkert Petersen verstrickt? Tammo Anders und seine Kollegin Fenna Stern ermitteln in alle Richtungen. Doch dem 
            Kommissar fällt es schwer, objektiv zu bleiben, denn mit dem Hauptverdächtigen hat er noch eine bittere Rechnung 
            offen...',
            'published' => new DateTime(),
            'user_id' => 1,
            'price' => 11.99,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        $book = App\Book::all()->where('isbn','9783462950844')->first();
        $authors = App\Author::all()->where('id',4);

        foreach ($authors as $author){
            $book->authors()->save($author);
        }
        $book->save();

        $ratings = App\Rating::all()->where('book_id',4);

        foreach ($ratings as $rating) {
            $book->ratings()->save($ratings);
        }
        $book->save();


        //add images

        DB::table('images')->insert([
            'title' => 'Tod am Deich',
            'url' => 'https://images-eu.ssl-images-amazon.com/images/I/51Y5FUBrXdL.jpg',
            'book_id' => 4,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        /*
        * Book 5
        */

        DB::table('books')->insert([
            'title' => 'Jaspers letzter Flirt',
            'isbn' => '9783762950844',
            'subtitle' => 'Ein Fall für die Kripo Wattenmeer',
            'rating' => 5,
            'description' => 'Mordanschlag auf Jasper Erikson! Der Amrumer Surflehrer entgeht nur knapp dem Tod, als in seinem 
            Auto eine Bombe hochgeht. Jasper selbst gibt sich nach dem ersten Schock betont gelassen und versucht, die 
            Angelegenheit auf seine Weise zu klären. Kuno Knudsen und Arne Zander von der Kripo Wattenmeer nehmen die Ermittlungen
             auf – und beißen auf Granit. Keiner der Befragten will etwas Verdächtiges gesehen oder gehört haben. Die Zeit läuft
             den Kommissaren davon, denn eins ist gewiss: Der Attentäter wird nicht aufgeben.
            Der zweite Fall für die Kripo Wattenmeer entführt die Leser in die idyllische, aber manchmal recht eigene 
            Welt der Nordseeinsel Amrum.',
            'published' => new DateTime(),
            'user_id' => 1,
            'price' => 9.99,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        $book = App\Book::all()->where('isbn','9783762950844')->first();
        $authors = App\Author::all()->where('id',4);

        foreach ($authors as $author){
            $book->authors()->save($author);
        }
        $book->save();

        $ratings = App\Rating::all()->where('book_id',5);

        foreach ($ratings as $rating) {
            $book->ratings()->save($ratings);
        }
        $book->save();


        //add images

        DB::table('images')->insert([
            'title' => 'Jaspers letzter Flirt',
            'url' => 'https://images-eu.ssl-images-amazon.com/images/I/51U1RdQiASL.jpg',
            'book_id' => 5,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
