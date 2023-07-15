<?php

namespace Database\Seeders;

use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $messages = [
            (object) [
                'name_patient' => 'Alessia Esposito',
                'email_patient' => 'alessia.esposito@example.com',
                'text' => 'Buongiorno, sto cercando un medico specializzato in cardiologia per una visita di controllo del mio cuore e degli esami di routine.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-05-10')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Gabriele Romano',
                'email_patient' => 'gabriele.romano@example.com',
                'text' => "Ciao, vorrei fissare un appuntamento con uno specialista in psichiatria per una valutazione e un eventuale trattamento per i miei disturbi dell'umore.",
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-06-20')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Elisabetta Bianchi',
                'email_patient' => 'elisabetta.bianchi@example.com',
                'text' => 'Salve, ho bisogno di prenotare una visita con un pediatra per una consulenza riguardo alle allergie alimentari di mio figlio.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-05-25')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Riccardo Verdi',
                'email_patient' => 'riccardo.verdi@example.com',
                'text' => 'Buonasera, vorrei fissare un appuntamento con un medico del lavoro per una valutazione ergonomica del mio posto di lavoro.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-07-15')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Martina Gialli',
                'email_patient' => 'martina.gialli@example.com',
                'text' => "Salve, sto cercando un chirurgo per una consultazione riguardo a un'ernia addominale che sto avvertendo.",
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-06-01')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Lorenzo Neri',
                'email_patient' => 'lorenzo.neri@example.com',
                'text' => 'Ciao, sto avendo problemi digestivi e vorrei prenotare una visita di gastroenterologia per una diagnosi approfondita.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-07-10')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Federico Martini',
                'email_patient' => 'federico.martini@example.com',
                'text' => 'Buongiorno, sto cercando un medico specializzato in allergologia per una serie di test allergici a causa di reazioni sospette.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-05-15')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Chiara Conti',
                'email_patient' => 'chiara.conti@example.com',
                'text' => "Salve, vorrei prenotare una visita con uno specialista in dermatologia per una valutazione di un'irritazione cutanea che persiste da tempo.",
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-07-05')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Gianluca Bianchi',
                'email_patient' => 'gianluca.bianchi@example.com',
                'text' => 'Ciao, sto cercando un medico specializzato in oncologia per una consultazione riguardo a una diagnosi di tumore.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-06-05')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Giorgia Romano',
                'email_patient' => 'giorgia.romano@example.com',
                'text' => 'Salve, vorrei prenotare una visita con uno specialista in urologia per una valutazione della funzionalità renale.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-05-20')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Marco Rossi',
                'email_patient' => 'marco.rossi@example.com',
                'text' => 'Salve, vorrei prenotare una visita con uno specialista in cardiologia per un controllo del mio cuore.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-06-18')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Laura Bianchi',
                'email_patient' => 'laura.bianchi@example.com',
                'text' => 'Buongiorno, sto cercando un medico specializzato in dermatologia per una valutazione di una eruzione cutanea.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-06-10')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Simone Verdi',
                'email_patient' => 'simone.verdi@example.com',
                'text' => 'Ciao, sto cercando un medico specializzato in urologia per una consultazione riguardo a un problema renale.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-06-25')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Francesca Romano',
                'email_patient' => 'francesca.romano@example.com',
                'text' => 'Salve, ho bisogno di prenotare una visita con un pediatra per un controllo di routine per mio figlio.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-06-05')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Giovanni Neri',
                'email_patient' => 'giovanni.neri@example.com',
                'text' => 'Ciao, sto cercando un medico specializzato in gastroenterologia per una valutazione di problemi digestivi.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-07-05')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Valentina Gialli',
                'email_patient' => 'valentina.gialli@example.com',
                'text' => 'Salve, vorrei fissare un appuntamento con uno specialista in allergologia per una serie di test allergici.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-05-15')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Antonio Bianchi',
                'email_patient' => 'antonio.bianchi@example.com',
                'text' => 'Buonasera, ho bisogno di prenotare una visita con un medico del lavoro per una valutazione delle condizioni di sicurezza sul posto di lavoro.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-07-10')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Eleonora Verdi',
                'email_patient' => 'eleonora.verdi@example.com',
                'text' => 'Salve, sto cercando un medico specializzato in oncologia per una consultazione riguardo a una diagnosi di tumore.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-06-20')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Luca Romano',
                'email_patient' => 'luca.romano@example.com',
                'text' => 'Ciao, vorrei prenotare una visita con uno specialista in psichiatria per una valutazione e un eventuale trattamento.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-07-15')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Elisa Neri',
                'email_patient' => 'elisa.neri@example.com',
                'text' => 'Salve, ho bisogno di prenotare una visita con uno specialista in chirurgia per una consultazione riguardo a un intervento chirurgico.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-07-25')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Giacomo Gialli',
                'email_patient' => 'giacomo.gialli@example.com',
                'text' => 'Buongiorno, sto cercando un medico specializzato in allergologia per una consultazione riguardo alle mie allergie stagionali.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-06-07')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Sara Bianchi',
                'email_patient' => 'sara.bianchi@example.com',
                'text' => 'Ciao, vorrei prenotare una visita con uno specialista in gastroenterologia per una diagnosi di problemi digestivi.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-07-20')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Fabrizio Romano',
                'email_patient' => 'fabrizio.romano@example.com',
                'text' => 'Salve, sto cercando un medico specializzato in cardiologia per un controllo del mio cuore e della mia pressione sanguigna.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-06-15')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Martina Neri',
                'email_patient' => 'martina.neri@example.com',
                'text' => 'Buongiorno, ho bisogno di fissare un appuntamento con un pediatra per una consulenza riguardo alla crescita di mio figlio.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-07-05')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Nicola Gialli',
                'email_patient' => 'nicola.gialli@example.com',
                'text' => 'Ciao, sto cercando un medico specializzato in oncologia per una consultazione riguardo a un programma di trattamento per il mio parente affetto da cancro.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-06-25')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Giulia Bianchi',
                'email_patient' => 'giulia.bianchi@example.com',
                'text' => "Salve, vorrei prenotare una visita con uno specialista in psichiatria per una valutazione e un eventuale trattamento per i miei disturbi d'ansia.",
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-07-15')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Andrea Romano',
                'email_patient' => 'andrea.romano@example.com',
                'text' => 'Ciao, sto cercando un medico specializzato in urologia per una consultazione riguardo a un problema alla vescica.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-06-12')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Valeria Neri',
                'email_patient' => 'valeria.neri@example.com',
                'text' => 'Salve, ho bisogno di prenotare una visita con un medico del lavoro per una valutazione delle condizioni di sicurezza sul posto di lavoro.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-07-10')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Riccardo Gialli',
                'email_patient' => 'riccardo.gialli@example.com',
                'text' => 'Buonasera, sto cercando un medico specializzato in allergologia per una serie di test allergici a causa di reazioni sospette.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-05-20')->toDateTimeString(),
            ],
            (object) [
                'name_patient' => 'Francesca Bianchi',
                'email_patient' => 'francesca.bianchi@example.com',
                'text' => 'Salve, vorrei prenotare una visita con uno specialista in gastroenterologia per una valutazione di un problema digestivo persistente.',
                'created_at' => Carbon::createFromFormat('Y-m-d', '2023-07-01')->toDateTimeString(),
            ],
        ];

        foreach ($messages as $message) {
            $message_create = new Message();
            $message_create->name_patient = $message->name_patient;
            $message_create->email_patient = $message->email_patient;
            $message_create->text = $message->text;
            $message_create->created_at = $message->created_at;
            $message_create->save();

        }
    }
}
