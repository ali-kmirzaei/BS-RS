<?php

namespace App\Http\Controllers\Client;

use App\Genre;
use App\Book;
use App\Http\Controllers\functions;
use App\Http\Controllers\Controller;

class BookGenreController extends Controller
{

    public function add_genres()
    {
        // $Genres = "Workplace tell_all-Historical romance-Juvenile fantasy-LGBT pulp fiction -Gay male pulp fiction-Lesbian pulp fiction-Lesbian erotica fiction-Paranormal romance-Romantic fantasy-Tragicomedy-Adventure novel -Epic-Imaginary voyage-Lost world-Men's adventure-Milesian tale-Picaresque novel-Apocalyptic-Sea story-Subterranean fiction-British literature-Children's literature -Young adult fiction -Class S-Light novel-Education fiction -Campus novel -Campus murder mystery-School story-Romance-Varsity novel-Erotic fiction -Erotic romance-Picaresque novel-Women's erotica-Experimental fiction -Antinovel-Ergodic literature-Graphic novel-Historical fiction -Historical romance -Metahistorical romance-Historical mystery-Holocaust novels-Plantation tradition-Prehistoric fiction-Regency novel -Regency romance-Contradiction-Literary fiction-Literary nonsense-Mathematical fiction-Metafiction-Nonfiction novel -Bildungsroman-Biographical novel -Autobiographical novel -Semi-autobiographical novel -I novel-Slave narrative -Contemporary slave narrative-Neo-slave narrative-Occupational fiction -Hollywood novel-Lab lit-Legal thriller-Medical fiction -Medical romance-Musical fiction-Sports fiction-Philosophical fiction -Existentialist fiction-Novel of ideas-Platonic dialogues-Political fiction -Political satire-Pulp fiction-Quantum fiction-Religious fiction -Christian fiction -Christian science fiction-Contemporary Christian fiction-Islamic fiction-Jewishfiction-Saga -Family saga-Speculative fiction -Fantasy -Epic / high fantasy-Hard fantasy-Historical fantasy -Prehistoric fantasy-Medieval fantasy-Wuxia-Low fantasy-Urban fantasy -Paranormal romance-Comic fantasy-Contemporary fantasy-Dark fantasy-Fantasy of manners-Heroic fantasy-Magic realism-Mythic-Paranormal fantasy-Shenmo fantasy-Superhero fantasy-Sword and sorcery-Horror -Body horror -Splatterpunk-Erotic-Gothic fiction -Southern Gothic-Psychological-Supernatural / paranormal -Cosmic-Ghost story-Monster literature -Jiangshi fiction-Vampire fiction-Werewolf fiction-Occult detective-Science fiction -Alien invasion-Post-apocalyptic-Cyberpunk derivatives, aka punk -Cyberpunk -Biopunk-Nanopunk-Postcyberpunk-Steampunk -Atompunk-Clockpunk-Dieselpunk-Dystopian-Hard science fiction-Military science fictionParallel universe, aka alternative universe -Alternative history-Scientific romance-Soft science fiction-Space opera-Bizarro fiction-Climate fiction (cli-fi)-Dying Earth-Science fantasy -Planetary romance -Sword and planet-Slipstream-Weird fiction -New Weird-Suspense fiction -Crime fiction-Detective fiction-Gong'an fiction-Mystery fiction-Thriller -Mystery fiction-Legal thriller-Medical thriller-Political thriller -Spy fiction-Psychological thriller-Techno-thriller-Tragedy -Melodrama-Urban fiction-Westerns-Women's fiction -Class S-Femslash-Matron literature-Romance novel-Yaoi-Yuri";
        $Genres = "رمان-ادبیات کودک و نوجوان-داستان تاریخی-داستان درام-داستان معمایی-داستان فانتزی-داستان تریلر-ادبیات نوجوان-داستان جنایی-داستان ماجرایی-داستان کمدی (طنز)-داستان علمی تخیلی-داستان اجتماعی-داستان جنگی-داستان وحشت-داستان فلسفی-داستان روانشناسانه-داستان رئال-داستان سیاسی-داستان پاد آرمان شهر-زندگی نامه-داستان مصور-داستان دینی-داستان زندگی خانوادگی-اسطوره ها و افسانه ها-داستان ماوراء الطبیعه-ادبیات دفاع مقدس-خود زندگی نامه-داستان عرفانی-داستان الهام بخش-داستان حماسی-داستان پسا رستاخیزی-داستان کمدی سیاه-داستان درام تاریخی-داستان علمی-داستان مرتبط با موسیقی-ادبیات گوتیک جنوبی-داستان مردم شناسی-داستان نمادین-داستان هنری-داستان هستی گرایانه-داستان برده داری-داستان پسا استعماری-داستان تکنولوژی-داستان پیکارسک";

        $Genres = explode("-",$Genres);
        foreach($Genres as $Genre){
            $exist = Genre::where('genre_name',$Genre)->first();
            if( $exist == null ){
                $new_data = [
                    'genre_name' => $Genre
                ];
                Genre::create($new_data);
            }
        }
        dd("OK");
    }

}
