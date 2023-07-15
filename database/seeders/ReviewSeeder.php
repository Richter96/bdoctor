<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use Carbon\Carbon;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reviews = [
            (object) [
                'name_patient' => 'Alessia Esposito',
                'text' => 'Il dottor Andrea Ferrari è un medico molto preparato e attento alle esigenze dei pazienti. La sua gentilezza e competenza mi hanno fatto sentire al sicuro durante tutto il percorso di cura.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-05-01')->toDateTimeString(),
                'doctor_id' => 1,
            ],
            (object) [
                'name_patient' => 'Gabriele Romano',
                'text' => 'Il dottor Andrea Ferrari è un medico straordinario che mette il benessere del paziente al primo posto. La sua professionalità e competenza mi hanno impressionato.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-06-01')->toDateTimeString(),
                'doctor_id' => 1,
            ],
            (object) [
                'name_patient' => 'Elisabetta Bianchi',
                'text' => 'Il dottor Andrea Ferrari è un medico estremamente competente e premuroso. Ha preso il tempo necessario per spiegarmi chiaramente il mio quadro clinico e le opzioni di trattamento disponibili.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-07-01')->toDateTimeString(),
                'doctor_id' => 1,
            ],
            (object) [
                'name_patient' => 'Riccardo Verdi',
                'text' => 'Il dottor Daniele Morello è un medico eccezionale con una grande conoscenza medica. La sua pazienza nel rispondere alle mie domande e il suo supporto durante il mio percorso di guarigione sono stati fondamentali.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-05-01')->toDateTimeString(),
                'doctor_id' => 2,
            ],
            (object) [
                'name_patient' => 'Martina Gialli',
                'text' => 'Il dottor Daniele Morello è un medico straordinario che dimostra una passione sincera per il suo lavoro. La sua competenza e l attenzione che dedica ai pazienti sono al di sopra delle aspettative.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-06-01')->toDateTimeString(),
                'doctor_id' => 2,
            ],
            (object) [
                'name_patient' => 'Lorenzo Neri',
                'text' => 'Il dottor Daniele Morello è un medico attento e disponibile. Ha fatto un lavoro eccellente nel gestire le mie preoccupazioni e ha fornito un trattamento efficace.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-07-01')->toDateTimeString(),
                'doctor_id' => 2,
            ],
            (object) [
                'name_patient' => 'Federico Martini',
                'text' => 'Il dottor Martina De Rosa è un medico molto competente e affidabile. La sua cura premurosa e il suo approccio professionale hanno contribuito in modo significativo al mio recupero.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-05-01')->toDateTimeString(),
                'doctor_id' => 3,
            ],
            (object) [
                'name_patient' => 'Chiara Conti',
                'text' => 'Il dottor Martina De Rosa è un medico straordinario che si prende cura dei suoi pazienti con grande empatia. La sua conoscenza medica e la sua capacità di spiegare le opzioni di trattamento sono state fondamentali per il mio percorso di guarigione.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-06-01')->toDateTimeString(),
                'doctor_id' => 3,
            ],
            (object) [
                'name_patient' => 'Gianluca Bianchi',
                'text' => 'Il dottor Martina De Rosa è un medico eccezionale, con una grande esperienza e competenza. La sua dedizione e la sua gentilezza mi hanno fatto sentire a mio agio durante tutto il trattamento.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-07-01')->toDateTimeString(),
                'doctor_id' => 3,
            ],
            (object) [
                'name_patient' => 'Giorgia Romano',
                'text' => 'Il dottor Riccardo Castiglione è un medico straordinario, sempre disponibile a rispondere alle domande e a fornire supporto. La sua professionalità e la sua attenzione ai dettagli sono state fondamentali per la mia salute.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-05-01')->toDateTimeString(),
                'doctor_id' => 4,
            ],
            (object) [
                'name_patient' => 'Marco Rossi',
                'text' => 'Il dottor Riccardo Castiglione è un medico competente e premuroso. La sua cura attenta e il suo approccio personalizzato hanno reso il mio percorso di cura molto confortevole.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-06-01')->toDateTimeString(),
                'doctor_id' => 4,
            ],
            (object) [
                'name_patient' => 'Laura Bianchi',
                'text' => 'Il dottor Riccardo Castiglione è un medico estremamente competente e attento. La sua capacità di ascolto e la sua cura empatica hanno reso la mia esperienza medica positiva e gratificante.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-07-01')->toDateTimeString(),
                'doctor_id' => 4,
            ],
            (object) [
                'name_patient' => 'Simone Verdi',
                'text' => 'Il dottor Nicola Faedo è un medico eccellente, sempre aggiornato sulle ultime scoperte mediche. La sua dedizione e il suo impegno nel fornire un trattamento di alta qualità sono ammirevoli.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-05-01')->toDateTimeString(),
                'doctor_id' => 5,
            ],
            (object) [
                'name_patient' => 'Francesca Romano',
                'text' => 'Il dottor Nicola Faedo è un medico straordinario, che dimostra una profonda compassione per i suoi pazienti. La sua competenza medica e la sua cura premurosa sono una combinazione perfetta.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-06-01')->toDateTimeString(),
                'doctor_id' => 5,
            ],
            (object) [
                'name_patient' => 'Giovanni Neri',
                'text' => 'Il dottor Nicola Faedo è un medico molto professionale e competente. La sua comunicazione chiara e la sua capacità di ascolto hanno contribuito a una diagnosi accurata e a un trattamento efficace.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-07-01')->toDateTimeString(),
                'doctor_id' => 5,
            ],
            (object) [
                'name_patient' => 'Valentina Gialli',
                'text' => 'Il dottor Luca Neri è un medico eccezionale, con una grande esperienza nel suo campo. La sua dedizione nel fornire una cura di qualità superiore è evidente in ogni visita.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-05-01')->toDateTimeString(),
                'doctor_id' => 6,
            ],
            (object) [
                'name_patient' => 'Antonio Bianchi',
                'text' => 'Il dottor Luca Neri è un medico attento e premuroso che si prende il tempo di spiegare chiaramente le opzioni di trattamento. La sua competenza e il suo interesse genuino per il benessere dei pazienti sono evidenti.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-06-01')->toDateTimeString(),
                'doctor_id' => 6,
            ],
            (object) [
                'name_patient' => 'Eleonora Verdi',
                'text' => 'Il dottor Luca Neri è un medico straordinario, dotato di una grande capacità di diagnosticare e trattare le condizioni mediche. La sua professionalità e la sua gentilezza lo rendono un medico di fiducia.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-07-01')->toDateTimeString(),
                'doctor_id' => 6,
            ],
            (object) [
                'name_patient' => 'Luca Romano',
                'text' => 'Il dottor Marco Rossi è un medico altamente qualificato e premuroso. Ha dimostrato una profonda conoscenza medica e un impeccabile cura dei pazienti durante tutto il percorso di trattamento.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-05-01')->toDateTimeString(),
                'doctor_id' => 7,
            ],
            (object) [
                'name_patient' => 'Elisa Neri',
                'text' => 'Il dottor Marco Rossi è un medico eccezionale che si impegna a fornire cure mediche di alta qualità. La sua dedizione e la sua competenza sono evidenti in ogni interazione.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-06-01')->toDateTimeString(),
                'doctor_id' => 7,
            ],
            (object) [
                'name_patient' => 'Giacomo Gialli',
                'text' => 'Il dottor Marco Rossi è un medico straordinario, con un approfondita conoscenza medica e una grande abilità nel comunicare con i pazienti. La sua cura empatica e il suo impegno nel migliorare la salute sono lodevoli.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-07-01')->toDateTimeString(),
                'doctor_id' => 7,
            ],
            (object) [
                'name_patient' => 'Sara Bianchi',
                'text' => 'Il dottor Matteo Bianchi è un medico competente e premuroso che si impegna a fornire cure di alta qualità. La sua attenzione ai dettagli e la sua disponibilità nel rispondere alle domande sono state molto apprezzate.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-05-01')->toDateTimeString(),
                'doctor_id' => 8,
            ],
            (object) [
                'name_patient' => 'Fabrizio Romano',
                'text' => 'Il dottor Matteo Bianchi è un medico straordinario, dotato di una vasta esperienza e una grande competenza. La sua cura attenta e il suo approccio personalizzato hanno fatto la differenza nella mia esperienza medica.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-06-01')->toDateTimeString(),
                'doctor_id' => 8,
            ],
            (object) [
                'name_patient' => 'Martina Neri',
                'text' => 'Il dottor Matteo Bianchi è un medico altamente qualificato e appassionato. La sua professionalità e la sua dedizione nel fornire cure di alta qualità sono evidenti in ogni interazione.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-07-01')->toDateTimeString(),
                'doctor_id' => 8,
            ],
            (object) [
                'name_patient' => 'Nicola Gialli',
                'text' => 'Il dottor Giovanni Verdi è un medico competente e premuroso che si impegna a fornire cure di alta qualità. La sua attenzione ai dettagli e la sua disponibilità nel rispondere alle domande sono state molto apprezzate.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-05-01')->toDateTimeString(),
                'doctor_id' => 9,
            ],
            (object) [
                'name_patient' => 'Giulia Bianchi',
                'text' => 'Il dottor Giovanni Verdi è un medico straordinario, dotato di una vasta esperienza e una grande competenza. La sua cura attenta e il suo approccio personalizzato hanno fatto la differenza nella mia esperienza medica.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-06-01')->toDateTimeString(),
                'doctor_id' => 9,
            ],
            (object) [
                'name_patient' => 'Andrea Romano',
                'text' => 'Il dottor Giovanni Verdi è un medico altamente qualificato e appassionato. La sua professionalità e la sua dedizione nel fornire cure di alta qualità sono evidenti in ogni interazione.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-07-01')->toDateTimeString(),
                'doctor_id' => 9,
            ],
            (object) [
                'name_patient' => 'Valeria Neri',
                'text' => 'Il dottor Maria Rame è un medico straordinario, con una conoscenza medica eccezionale e una capacità di ascolto empatica. Sono grato per il suo impegno nel migliorare la mia salute.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-05-01')->toDateTimeString(),
                'doctor_id' => 10,
            ],
            (object) [
                'name_patient' => 'Riccardo Gialli',
                'text' => 'Il dottor Maria Rame è un medico altamente competente e professionale. La sua dedizione e attenzione ai dettagli si riflettono nella qualità della sua assistenza medica.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-06-01')->toDateTimeString(),
                'doctor_id' => 10,
            ],
            (object) [
                'name_patient' => 'Francesca Bianchi',
                'text' => 'Il dottor Maria Rame è un medico molto professionale e competente. La sua comunicazione chiara e la sua capacità di ascolto hanno contribuito a una diagnosi accurata e a un trattamento efficace.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-07-01')->toDateTimeString(),
                'doctor_id' => 10,
            ],
        ];

        foreach ($reviews as $review) {
            $review_create = new Review();
            $review_create->name_patient = $review->name_patient;
            $review_create->text = $review->text;
            $review_create->doctor_id = $review->doctor_id;
            $review_create->created_at = $review->created_at;
            $review_create->save();
        }
    }
}
