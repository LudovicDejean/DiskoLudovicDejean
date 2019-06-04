function gBox(signature) {
    if (document.getElementById(signature).checked === true) {
        return true;
    } else {
        alert('Veuillez cocher la case');
        return false;
    }
}
function Banhammer(){
    if(document.getElementById('ban').checked===true){
        return(confirm('Attention vous allez bannir cette personne êtes vous sûr ?'));
    }else{
        return true;
    }
}
function SuppAdm(){
    if(document.getElementById('Desactive').checked===true){
        return(confirm('Attention vous allez désactiver cet admin, êtes-vous sûr ?'));
    }else if(document.getElementById('supp').checked===true){
        return (confirm('Attention vous allez supprimer cet administrateur. La suppression est définitive. êtes-vous sûr ?'));
    }else{
        return true;
    } 
}

function verifSaisie(champ){
    if(champ.value.length<2){
        
        surligne(champ, true);
        return false;

    } else {
        surligne(champ, false);

        return true;
    }
}
function verifNom(champ)

{

    if (champ.value.length < 2 || champ.value.length > 25)

    {

        surligne(champ, true);

        return false;

    } else

    {

        surligne(champ, false);

        return true;

    }

}
function surligne(champ, erreur)

{

    if (erreur)
        champ.style.backgroundColor = "#FF0000";

    else
        champ.style.backgroundColor = "";

}

function verifJour(champ) {
    jour = parseInt(champ.value);
    if (isNaN(jour) || jour < 1 || jour > 31)
    {

        surligne(champ, true);

        return false;

    } else

    {

        surligne(champ, false);

        return true;

    }
}

function verifMois(champ) {
    mois = parseInt(champ.value);
    if (isNaN(mois) || mois < 1 || mois > 12) {

        surligne(champ, true);

        return false;

    } else

    {

        surligne(champ, false);

        return true;

    }
}

function verifAnnnee(champ) {
    date = new Date();
    annee = parseInt(champ.value);
    if (isNaN(annee) || annee < date.getFullYear() - 120 || annee >= date.getFullYear()) {

        surligne(champ, true);

        return false;

    } else

    {

        surligne(champ, false);

        return true;

    }
}


function VerifTel(champ){
        if(/^[0-9]{10}$/.test(champ.value)){
                surligne(champ, false);
               return true;
        } else {
            surligne(champ, true);
            return false; 
        }
    }
function VerifMail(champ){
    if(/^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$/.test(champ.value)){
        surligne(champ, false);
            return true;
        } else {
            surligne(champ, true);
            return false;
        }
    }
    function convert(age){
	var tps=age/1000;
	tps=tps/60;
	tps=tps/60;
	tps=tps/24;
	tps=tps/365;
	return tps;
	}
    function majeur(date){
        var dn=new Date();
	var auj=new Date();
	dn.setFullYear(date);	//détermine les entrée comme date
	var age=auj-dn;	//temps écoulé avec aujourd'hui
	if(convert(age)<18){
		alert('mineur');
	}else{
            alert('majeur');
        }
    }
    function verifForm(f){
        var VerifTelOK=VerifTel(f.tel);
        var VerifNomOK=verifNom(f.nom);
        var VerifPrenom=verifNom(f.prenom);
        var AdresseOK=verifAdresse(f.addr);
        var CPOK=VerifCP(f.CP);
        var VilleOK=verifSaisie(f.ville);
        var mailOK=VerifMail(f.mail);
        var FBOK=verifSaisie(f.FB);
        var signature=gBox('signature');
        if(VerifTelOK && VerifNomOK && VerifPrenom && AdresseOK && CPOK && VilleOK && mailOK &&FBOK &&signature){
            return true;
        }else{
            document.getElementById('signature').checked = false;
            alert('Veuillez remplir tous les champs au bon formats');
            return false;
        }}
    function verifFormMaj(f){
        var VerifTelOK=VerifTel(f.tel);
        var VerifNomOK=verifNom(f.nom);
        var VerifPrenom=verifNom(f.prenom);
        var AdresseOK=verifAdresse(f.addr);
        var CPOK=VerifCP(f.CP);
        var VilleOK=verifSaisie(f.ville);
        var mailOK=VerifMail(f.mail);
        var FBOK=verifSaisie(f.FB);
        if(VerifTelOK && VerifNomOK && VerifPrenom && AdresseOK && CPOK && VilleOK && mailOK &&FBOK){
            return true;
        }else{
            alert('Veuillez remplir tous les champs au bon formats');
            return false;
        }
    }