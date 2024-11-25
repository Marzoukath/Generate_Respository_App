<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Certificat de Résidence</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        .container {
            /* width: 650; 
            min-height: 950px;  */
            padding: 30px;
            border: 1px solid #000;
            margin: auto;
            background-image: url('background.png'); /* Ajoutez une image de fond si nécessaire */
            background-size: cover;
            position: relative;
            border-radius: 20px;
            background-color:      #BED3C3;
        }

        .header {
            text-align: center;
            font-weight: bold;
            font-size: 16px;
        }

        .subheader {
            text-align: center;
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
            text-decoration: underline;
        }

        .details {
            margin-top: 30px;
            line-height: 1.8;
            color:; /* Couleur douce pour le texte */
        }

        .details span {
            font-weight: bold;
        }

        .footer {
            position: absolute;
            bottom: 50px;
            width: 100%;
            text-align: center;
            font-size: 12px;
        }

         .signature {
            text-align: right   ;
            margin-top: 50px;
        }

        .signature img {
            width: 150px;
            height: auto;
            margin-top: 10px;
        } 

        .requerent {
            text-align: center;
            position: relative;
            width: 100%;
            border-bottom: 2px solid black; /* Trait plein sous REQUERANT */
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
   
        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 80px;
            height: 80px;
         
            
        }
        .logo1 {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 80px;
            height: 80px;
         
            
        }

        .logo img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
           
        }
        .logo1 img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
           
        }

     
    

        .personal-info p {
            margin: 5px 0;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="container">
           
            <div class="logo">
                <img src="C:\Users\user\Documents\GIT4\My_Project\Generate_Respository_App\resources\views\logo12.png" alt="Logo">
            </div>
            <div class="logo1">
                <img src="C:\Users\user\Documents\GIT4\My_Project\Generate_Respository_App\resources\views\photo.jpg" alt="Logo">
            </div>
        <div class="header">
      
            <p>REPUBLIQUE DU BENIN</p>
            <p>MINISTERE DE L'INTERIEUR DE LA SECURITE ET DE LA DECENTRALISATION</p>
            <p>DEPARTEMENT DE L'ATLANTIQUE</p>
        </div>

        <div class="subheader">
            <h2>CERTIFICAT DE RÉSIDENCE</h2>
        </div>

        <div class="details">
            <p class="requerent"><span>Numéro du Document: {{$user->id + 511}}</ </span></p>
            <p><span>Je sousigné, le Chef quartier de la ville de Cotonou :</span>    Mr. {{$user->chief_neighborhood}} </p>
            <p class="">
             
                <span>Nom :</span>    {{ $user->first_name }} <br>
                
                <span>Prénom :</span>    {{ $user->last_name }} <br>
                <span>Email :</span>     {{ $user->email }} <br>
                <span>Téléphone :</span>  {{ $user->phone }} <br>
                <span>Numéro d'identification :</span> {{ $user->id_number }} <br>
            </p>
            <p>est en résidence régulière à <span>{{$user ->neighborhood}}</span></p>
        </div>

        <div class="">
            <p>Fait à Cotonou, le {{ date('d/m/Y') }}</p>
            <div class="signature">
                <p>Le Chef du Quartier </p>
                <img src="C:\Users\user\Documents\GIT4\My_Project\Generate_Respository_App\resources\views\sign.png" alt="Signature" /> <!-- Ajouter la photo de signature -->
            </div>
        </div>
    </div>
</body>
</html>
