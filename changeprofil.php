<?php 
    session_start();
    include_once "includes/functions.php";
    
    $user = $_SESSION['login'];
    $info = get_utilisateur($user);
    $result = $info ->fetchAll();    
    foreach( $result as $ligne) 
            { $nom = $ligne['nom_eleve'];
                $prenom = $ligne['prenom_eleve'];
            }
    $info = get_info_from_eleve($nom, $prenom);
    $res = $info->fetchAll();
    

    $etat = get_id_etat($nom, $prenom);
    $id_etat = $etat->fetch();
    

    $dispo = is_available($id_etat['id_etat']); 
    $result = $dispo->fetchAll();
    
    
    // affichage de profil avec modification du profil

        if (isset($_POST['genre'])) {
            
            $requete = getDB()->prepare("UPDATE eleve 
            SET date_naissance = :date_naissance, annee=:annee, sexe=:sexe, telephone_eleve=:telephone_eleve,
            ad_mail=:ad_mail, ad_postale=:ad_postale, code_postal=:code_postal, ville=:ville
            WHERE nom_eleve=:nom_eleve AND prenom_eleve=:prenom_eleve");
    
            //$lenom =$nom;
            //$leprenom=$prenom; 
            $ladate=$_POST['dateNaissance']; 
            $lannee=$_POST['promotion']; 
            $legenre=$_POST['genre']; 
            $letel=$_POST['tel']; 
            $lemail=$_POST['mail']; 
            $larue=$_POST['rue']; 
            $lecode=$_POST['codeP']; 
            $laville=$_POST['ville']; 
            
    
            $requete->bindValue('nom_eleve',$nom); 
            $requete->bindValue('prenom_eleve',$prenom); 
    
            $requete->bindValue('date_naissance',$ladate); 
            $requete->bindValue('annee',$lannee); 
            $requete->bindValue('sexe',$legenre); 
            $requete->bindValue('telephone_eleve',$letel); 
            $requete->bindValue('ad_mail',$lemail); 
            $requete->bindValue('ad_postale',$larue); 
            $requete->bindValue('code_postal',$lecode); 
            $requete->bindValue('ville',$laville); 
            
    
            $requete->execute();

            $req = getDB()->prepare("UPDATE etat
            SET telephone_eleve =:telephone_eleve, sexe=:sexe, ad_mail=:ad_mail, ad_postale=:ad_postale,
            code_postal =:code_postal, ville=:ville
            WHERE id_etat=:id_etat");

            if(isset($_POST['secuAd'])){$lasecuLieu = 1;} else{$lasecuLieu = 0;}
            if(isset($_POST['secuMail'])){$lasecuMail = 1;} else{$lasecuMail = 0;}
            if(isset($_POST['secuTel'])){$lasecuTel = 1;} else{$lasecuTel = 0;}
            if(isset($_POST['secuGenre'])){$lasecuGenre = 1;} else{$lasecuGenre = 0;}
            $lidetat = $id_etat['id_etat'];

            $req->bindValue('telephone_eleve',$lasecuTel);
            $req->bindValue('sexe',$lasecuGenre); 
            $req->bindValue('ad_mail',$lasecuMail); 
            $req->bindValue('ad_postale',$lasecuLieu); 
            $req->bindValue('code_postal',$lasecuLieu); 
            $req->bindValue('ville',$lasecuLieu); 
            $req->bindvalue('id_etat', $lidetat);

            $req->execute();

            redirect('profil.php');
        }
