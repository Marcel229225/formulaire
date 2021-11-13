<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=formulaire, initial-scale=1.0">
    <title>Formulaire</title>
    <style>
        .lieu {
            text-align: right;
        }

        .clinique {
            text-align: left;
            text-decoration: underline;
        }

        .fiche {
            text-align: center;
            color: blue;
            text-decoration: underline;
        }

        .mensuration {
            text-align: left;
            text-decoration: underline;
        }

        .infrimerie {
            text-decoration: underline;
        }

        .tab {
            border: 1px black solid;
        }

        .tab2 {
            border: 1px black solid;
        }

        .button {
            text-align: right;
        }

        .container {
            width: 1000px;
            height: 350px;
            margin: 8% auto;
            background: #fff;
            border-radius: 5px;
            position: relative;
            border-block-color: black;
        }

        .chantier {
            color: red;
        }

        .infirmerie {
            text-decoration: underline;
        }

    </style>
</head>

<body>
    <div class="container">
        <img src="medical.jpg" alt="medical" style="width:100px;height:100px">
        <div class=" lieu ">
            <input type="text " name="lieu " id="lieu " {{$boss[0]->lieu}}/>
            <label for="Date ">Le</label>
            <input type="date " name="Date " id="Date " {{$boss[0]->created_at}}
            /><br><br>
            <div>
                <strong class="infirmerie ">INFIRMERIE:</strong>
                <strong class="chantier ">CHANTIER:</strong>
                <input type="text " name="chantier" id="chantier" {{$boss[0]->chantier}}/>
            </div>
        </div><br>
        <div class="fiche ">
            <label for="text "><strong>FICHE MEDICALE N°</strong></label>
            <input type="text " name="numero" id="numero" {{$boss[0]->numero}}/>
        </div><br><br>

        <div>
            <label for="text ">Nom & Prénoms:</label>
            <input type="text " name="nom_prenom" id="nom_prenom" {{$boss[0]->nom_prenom}}/><br>

            <label for="age ">Age:</label>
            <input type="number " name="age" id="age" {{$boss[0]->age}}/>

            <label for="poste ">Poste de travail:</label>
            <input type="text " name="poste_de_travail" id="poste_de_travail" {{$boss[0]->poste_de_travail}}/>
        </div>
        <div>
            <div class="clinique ">
                <strong>Antécédents Familiaux</strong>
            </div>
            <textarea name="antécédents_familiaux" id="antécédents_familiaux" cols="50 " rows="2">{{$boss[0]->antécédents_familiaux}}</textarea>
            <div class="clinique ">
                <strong>Antécédents Professionnels</strong>
            </div>
            <textarea name="antécédents_professionnels" id="antécédents_professionnels" cols="50 " rows="2">{{$boss[0]->antécédents_professionnels}}</textarea>
        </div>
        <br>
        <div>
            <div class="clinique "><strong>I- Clinique</strong> </div><br>
            <div class="clinique ">
                <strong>Plaintes</strong>
            </div>
            <textarea name="Plaintes" id="Plaintes" cols="50 " rows="2 ">{{$boss[0]->Plaintes}}</textarea>
            <div class="mensuration "><strong>Mensurations:</strong></div><br><br>
            <div class="tab ">
                <label for="poids ">Poids</label>
                <input type="number " name="poids" id="poids" placeholder="..............kg " {{$boss[0]->poids}}/>
                <label for="taille ">Taille:</label>
                <input type="number " name="taille" id="taille " placeholder="..............m " {{$boss[0]->taille}}/>
                <label for="TA ">TA:</label>
                <input type="text " name="ta" id="ta" placeholder="......../......mmHg " {{$boss[0]->ta}}/><br><br>

                <label for="PT ">PT</label>
                <input type="number " name="pt" id="pt" placeholder="..............cm " {{$boss[0]->pt}}/>
                <label for="PA ">PA</label>
                <input type="number " name="pa" id="pa" placeholder="..............cm " {{$boss[0]->pa}}/>
                <label for="pouls ">Pouls</label>
                <input type="number " name="pouls" id="pouls" placeholder="..............pls/mn " {{$boss[0]->pouls}}/><br><br>

                <label for="AV ">AV : OD :</label>
                <input type="number " name="av_od" id="av_od" placeholder="............../10 " {{$boss[0]->av_od}}/>
                <label for="OG ">OG :</label>
                <input type="number " name="og" id="og" placeholder="............../10 " {{$boss[0]->og}}/><br><br>
            </div>
            <div class="clinique "><strong>Examen Physiques</strong></div><br>
            <textarea name="examen_physique" id="examen_physique" cols="50 " rows="2">{{$boss[0]->examen_physique}}</textarea><br><br>

            <div class="clinique "><strong>II- Examens complémentaires</strong> </div><br>
            <div class="tab2 ">
                <ul>
                    <li>Biologie
                        <label for="Urine ">- Urines : Glucosurie :</label>
                        <input type="text " name="glucoserie" id="glucoserie" {{$boss[0]->glucoserie}}/>
                        <label for="Albuminurie ">- Albuminurie :</label>
                        <input type="text " name="albiminurie" id="albiminurie" {{$boss[0]->albiminurie}}/><br>
                        <label for="Sang ">- Sang :</label>
                        <input type="text " name="sang" id="sang" {{$boss[0]->sang}}/>
                        <div class="clinique ">
                            <strong>Autres</strong>
                        </div>
                        <textarea name="autres" id="autres" cols="50 " rows="5">{{$boss[0]->autres}}</textarea>

                    </li><br>
                    <div class="clinique ">
                        <strong>Electrocardiogramme :</strong>
                    </div>
                    <textarea name="Electrocardiogramme" id="Plaintes" cols="50 " rows="2 ">{{$boss[0]->electrocardiogramme}}</textarea>
                    <div class="clinique ">
                        <strong>Audiométrie :</strong>
                    </div>
                    <textarea name="audiometrie" id="audiometrie" cols="50 " rows="2 ">{{$boss[0]->audiometrie}}</textarea>
                    <div class="clinique ">
                        <strong>Spirométrie :</strong>
                    </div>
                    <textarea name="spirometrie" id="spirometrie" cols="50 " rows="2 ">{{$boss[0]->spirometrie}}</textarea>
                </ul>
            </div>
            <br>
        </div>
        <div class="clinique "><strong>III- Conduite à tenir</strong><br>
            <textarea name="conduite_a_tenir" id="conduite_a_tenir" cols="50" rows="2">{{$boss[0]->conduite_a_tenir}}</textarea><br><br>

        </div><br>
        <div class="clinique "><strong> Ordonnance médicale :</strong></div><br>
        <textarea name="ordonnance" id="ordonnance" cols="50 " rows="2">{{$boss[0]->ordonnance}}</textarea><br><br>


        <div class="clinique "><strong>IV- Aptitude</strong><br>
            <textarea name="aptitude" id="aptitude" cols="50 " rows="2">{{$boss[0]->aptitude}}</textarea><br><br>
        </div>

    </div>
</body>

</html>
