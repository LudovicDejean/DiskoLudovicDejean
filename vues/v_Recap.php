<div class="container"><h1>Recapitulatif de votre <?php
        $test = PdoDisko::getUnePersonne($nom, $prenom, $bd);
        $dateN = explode('-', $bd);
        echo 'Message</h1>';
        echo '<div>' . $nom . ' ' . $prenom . '<br>'
        . 'Date de naissance : ' . $dateN[2] . '/' . $dateN[1] . '/' . $dateN[0] . '<br>'
        . 'Sujet : ' . $sujet . ' <br>'
        . 'Message : ' . $message . ' <br>'
        . 'Adresse Mail : ' . $mail . '<br>'
        . 'TÃ©lÃ©phone : ' . $tel . '<br></div>'
        . 'A Montpellier <br> Le ' . date('d/m/Y') . '<br>';

        /*$to = "dejean.ludovic@gmail.com";

        require_once 'swiftmailer-master/lib/swift_required.php';
        $smtp_param = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465)
                ->setUsername('dejean.ludovic@gmail.com')
                ->setPassword('motdepasse_adress_mail');
        $instance_swiftmailer = Swift_Mailer::newInstance($smtp_param);
        $instance_message = Swift_Message::newInstance();

        $instance_message->setSubject(utf8_encode($sujet))
                ->setFrom(array($mail => 'Adresse from'))
                ->setTo(array($to => 'Adresse to'))
                ->setBody('<html><head></head><body>
                    <p>' . $message . '</p></body>'
                        , 'text/html')
                ->setPriority(2);
        
        $type = $instance_message->getHeaders()->get('Content-Type');
        $type->setValue('text/html');
        $type->setParameter('charset', 'iso-8859-1');

        if ($instance_swiftmailer->send($instance_message, $fail)) {
            echo 'Envoyé ';
        } else {
            echo 'ERREUR : ';
            print_r($fail);
        }*/


          $to = "dejean.ludovic@gmail.com";
          $headers =  'MIME-Version: 1.0' . "\n";
          $headers .= 'From:' . $mail . "\n";
          $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";

          if (mail($to, $sujet, $message, $headers )) {
          echo'<script> alert("Un mail viens d\'etre envoye à un administrateur")</script>';
          }
        ?>
        <form action="index.php" method="POST">
            <input class="btn btn-default" type="submit" value="Valider" name="validation">
        </form>
</div>



