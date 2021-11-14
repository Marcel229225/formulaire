<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=formulaire, initial-scale=1.0">
    <title>Formulaire</title>
    <style>
        .clinique {
            text-align: left;
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
        <div class=" lieu ">
            <label for="Date " style="text-align: right;">{{ $boss[0]->lieu }} <strong>Le</strong> {{ $boss[0]->created_at }}<br><br>
            <div>
                <strong class="infirmerie ">INFIRMERIE:</strong>
                <strong class="chantier " style="text-decoration: underline;">CHANTIER:</strong> {{ $boss[0]->chantier }}
            </div>
        </div>
        <br>
        <div class="fiche ">
            <label for="text "><strong>FICHE MEDICALE N°</strong> {{ $boss[0]->numero }}</label>
        </div><br><br>

        <div>
            <strong for="text " style="text-decoration: underline;">Nom & Prénoms:</strong> {{ $boss[0]->nom_prenom }}
            <br />
            <br />

            <strong for="age " style="text-decoration: underline;">Age:</strong> {{ $boss[0]->age }}
            <br />
            <br />

            <strong for="poste " style="text-decoration: underline;">Poste de travail:</strong> {{ $boss[0]->poste_de_travail }}
            <br /> <br />
            <div class="clinique ">
                <strong style="text-decoration: underline;">Antécédents Familiaux</strong>
            </div>
            <textarea name="antecedents_familiaux" id="antecedents_familiaux" cols="50 "
                rows="2">{{ $boss[0]->antecedent_familiux }}</textarea>
            <div class="clinique ">
                <strong style="text-decoration: underline;">Antécédents Professionnels</strong>
            </div>
            <textarea name="antecedents_professionnels" id="antecedents_professionnels"
                cols="50 " rows="2">{{ $boss[0]->antecedent_professionnel }}</textarea>
        </div>
        <br />
        <br />
        <div>
            <div class="clinique " style="text-decoration: underline;"><strong>I- Clinique</strong> </div><br>
            <strong style="text-decoration: underline;">Plaintes</strong>
            <textarea name="plainte " id="plainte " cols="50 " rows="7 ">{{ $boss[0]->Plaintes }}</textarea> <br />
            <div class="mensuration"><strong style="text-decoration: underline;">Mensurations</strong></div>
            <div class="tab ">
                <strong style="text-decoration: underline;">Poids:</strong> {{ $boss[0]->poids }}
                <input type="number " name="poids " id="poids " placeholder="..............kg " />
                <strong style="text-decoration: underline;">Taille:</strong> {{ $boss[0]->taille }}
                <input type="number " name="taille " id="taille " placeholder="..............m " />
                <strong style="text-decoration: underline;">TA:</strong> {{ $boss[0]->ta }}
                <input type="text " name="TAe " id="TA " placeholder="......../......mmHg " /><br><br>

                <strong style="text-decoration: underline;">PT:</strong> {{ $boss[0]->pt }}
                <input type="number " name="PT " id="PT " placeholder="..............cm " />
                <strong style="text-decoration: underline;">PA:</strong> {{ $boss[0]->pa }}
                <input type="number " name="PA " id="PA " placeholder="..............cm " />
                <strong style="text-decoration: underline;">Pouls:</strong> {{ $boss[0]->pouls }}
                <input type="number " name="pouls " id="pouls " placeholder="..............pls/mn " /><br><br>

                <strong style="text-decoration: underline;">AV : OD :</strong> {{ $boss[0]->av_od }}
                <input type="number " name="AV " id="AV " placeholder="............../10 " />
                <strong style="text-decoration: underline;">OG :</strong> {{ $boss[0]->og }}
                <input type="number " name="OG " id="OG " placeholder="............../10 " /><br><br>
            </div><br>
            <div class="clinique " style="text-decoration: underline;"><strong>Examen Physiques</strong></div><br>
            <textarea name="examen " id="examen " cols="50 "
                rows="7 ">{{ $boss[0]->examen_physique }}</textarea><br><br>

            <div class="clinique " style="text-decoration: underline;"><strong>II- Examens complémentaires</strong> </div><br>
            <div class="tab2 ">
                <ul>
                    <li>Biologie
                        <strong style="text-decoration: underline;">- Urines : Glucosurie :</strong> {{ $boss[0]->glucoserie }}
                        <input type="text " name="Urine " id="Urine " />
                        <strong style="text-decoration: underline;">- Albuminurie :</strong> {{ $boss[0]->albiminurie }}
                        <input type="text " name="Albuminurie " id="Albuminurie " /><br>
                        <strong style="text-decoration: underline;">- Sang :</strong> {{ $boss[0]->sang }}
                        <input type="text " name="Sang " id="Sang " />
                        <div>
                            <strong>Autres</strong>
                        </div>
                        <textarea name="autre" id="autre" cols="50 " rows="5">{{ $boss[0]->autre }}</textarea>
                    </li>
                    <li class="clinique ">
                        <strong style="text-decoration: underline;">Electrocardiogramme :</strong>
                    </li>
                    <textarea name="electrocardiogramme" id="electrocardiogramme" cols="50 " rows="2 ">{{ $boss[0]->electrocardiogramme }}</textarea>
                    <li class="clinique ">
                        <strong style="text-decoration: underline;">Audiométrie :</strong>
                    </li>
                    <textarea name="audiometrie" id="audiometrie" cols="50 " rows="2 ">{{ $boss[0]->audiometrie }}</textarea>
                    <li class="clinique ">
                        <strong style="text-decoration: underline;">Spirométrie :</strong>
                    </li>
                    <textarea name="spirometrie" id="spirometrie" cols="50 " rows="2 ">{{ $boss[0]->spirometrie }}</textarea>
                </ul>
            </div>
            <br>
        </div>
        <div class="clinique " style="text-decoration: underline;"><strong>III- Conduite à tenir</strong></div>
            <textarea name="conduite_a_tenir" id="conduite_a_tenir" cols="50"rows="2">{{ $boss[0]->conduite_a_tenir }}</textarea>

        <br />
        <div class="clinique " style="text-decoration: underline;" ><strong> Ordonnance médicale :</strong>  </div>
            <textarea name="ordonnance" id="ordonnance" cols="50 " rows="2">{{ $boss[0]->ordonnance }}</textarea>

        <br />


        <div class="clinique " style="text-decoration: underline;"><strong>IV- Aptitude</strong>  </div>
               <textarea name="aptitude" id="aptitude" cols="50" rows="2">{{ $boss[0]->aptitude }}</textarea>
    </div>

    <div class=" lieu "><strong class="infirmerie ">Signature et cachet du medecin</strong></div>
</div>
</body>

</html>
