$(document).ready(function () {
  /*=============Fonction date de naissance===================*/
  function dateNaissance(date) {
    var numeriqueTransforme = date.replace(/\//g, "");
    var numerique = $.isNumeric(numeriqueTransforme);
    var nbNumerique = numeriqueTransforme.toString();
    var dateExtrat = date.split("/");
    var jour = dateExtrat[0];
    var mois = dateExtrat[1];
    var annee = dateExtrat[2];
    var naissance = new Date(mois + "/" + jour + "/" + annee);

    if (
      numerique == true &&
      nbNumerique.length == 8 &&
      naissance != "Invalid Date"
    ) {
      chaineValide = true;
    } else {
      chaineValide = false;
    }
    return chaineValide;
  }
  /*=============Fonction date de naissance===================*/

  /*=============Fonction Age=================================*/
  function Age(date) {
    var dateExtrat = date.split("/");
    var birth_day = dateExtrat[0];
    var birth_month = dateExtrat[1];
    var birth_year = dateExtrat[2];

    var today_date = new Date();
    //var today_year = today_date.getFullYear();
    var today_year = $("input[name=anneeInscription]").val();
    var today_month = today_date.getMonth();
    var today_day = today_date.getDate();
    var age = today_year - birth_year;

    if (today_month < birth_month - 1) {
      age--;
    }
    if (birth_month - 1 == today_month && today_day < birth_day) {
      age--;
    }

    return age;
  }
  /*=============Fonction Age=================================*/

  var lieuEntraiement = $(".lieuEntrainement");
  /*========Foreach=========*/
  $.each(lieuEntraiement, function () {
    $(this).on("click", function () {
      /*Pour le count check*/
      nameLieuEntraiement = $(this);

      $("#lieuEntrainementModal .modal-container .page .horaire").html("");

      var naissanceEnfant = $(".naissanceEnfant");
      var niveauEntrainement = $(".niveauEntrainement");

      var naissanceEnfantVal = naissanceEnfant.val();
      var niveauEntrainementVal = niveauEntrainement.val();

      /*=====Valeur du choix 1 dans lieuEntrainement=====*/
      var Choix_1 = $(".choix_1").val();
      /*=====Valeur du choix 2 dans lieuEntrainement=====*/
      var Choix_2 = $(".choix_2").val();
      /*==========Name choix1 Enfant n ===================*/
      var nameChoix_1 = $(".choix_1").attr("name");
      /*==========Name choix2 Enfant n ===================*/
      var nameChoix_2 = $(".choix_2").attr("name");
      /*=======Session Choix 1====*/
      var choix1_ID = sessionStorage.getItem(nameChoix_1);
      //console.log(choix1_ID);
      var choix2_ID = sessionStorage.getItem(nameChoix_2);
      //console.log(choix2_ID);

      /*======Initialisation des choix========*/
      //$(this).parent().find(".choix_1").val("");
      //$(this).parent().find(".choix_2").val("");
      //var choix1_initial = $("#"+choix1_ID).val();
      //var choix2_initial = $("#"+choix2_ID).val();
      //$(this).parent().find(".choix_1").val(choix1_initial);
      //$(this).parent().find(".choix_2").val(choix2_initial);

      var ageMin = 4 - 1;
      var ageMax = 15 - 1;

      if (
        niveauEntrainementVal == "" ||
        naissanceEnfantVal == "" ||
        dateNaissance(naissanceEnfantVal) == false ||
        Age(naissanceEnfantVal) < ageMin ||
        Age(naissanceEnfantVal) > ageMax
      ) {
        $(".horaire").addClass("none");
        $(".Fermer").html("Fermer");

        if (
          Age(naissanceEnfantVal) < ageMin &&
          dateNaissance(naissanceEnfantVal) == true
        ) {
          $(".modalite").html(
            "Les cours de tae-kwon-do enfants débutent à partir de 4 ans, veuillez vérifier la date de naissance."
          );
        } else if (
          Age(naissanceEnfantVal) > ageMax &&
          dateNaissance(naissanceEnfantVal) == true
        ) {
          $(".modalite").html(
            "Les cours de tae-kwon-do enfants s'arrêtent à partir de 15 ans, veuillez vérifier la date de naissance."
          );
        } else if (naissanceEnfantVal == "" && niveauEntrainementVal == "") {
          $(".modalite").html(
            "Veuillez d'abord renseigner un niveau et une date de naissance valide."
          );
        } else if (
          naissanceEnfantVal == "" ||
          dateNaissance(naissanceEnfantVal) == false
        ) {
          $(".modalite").html(
            "Veuillez d'abord renseigner une date de naissance valide."
          );
        } else if (niveauEntrainementVal == "") {
          $(".modalite").html("Veuillez d'abord renseigner un niveau.");
        }

        if (
          naissanceEnfantVal == "" ||
          dateNaissance(naissanceEnfantVal) == false ||
          Age(naissanceEnfantVal) < ageMin ||
          Age(naissanceEnfantVal) > ageMax
        ) {
          naissanceEnfant.addClass("styleErreur");
        } else {
          naissanceEnfant.removeClass("styleErreur");
        }
        if (niveauEntrainementVal == "") {
          niveauEntrainement.addClass("styleErreurSelect");
        } else {
          niveauEntrainement.removeClass("styleErreurSelect");
        }
      } else {
        $(".horaire").removeClass("none");
        if (niveauEntrainementVal == "ToutNiveau") {
          $(".modalite").html(
            "Veuillez choisir jusqu'à 2 créneaux horaires parmi la liste ci-dessous par ordre de préférence.<br><br>"
          );
          $(".Fermer").html("Enregistrer");
        } else if (niveauEntrainementVal == "Competiteur") {
          $(".modalite").html(
            "Veuillez trouver ci-dessous les créneaux horaires des jeunes compétiteurs. Attention ces séances sont réservées aux athlètes sélectionnés par les entraineurs.<br><br>"
          );
          $(".Fermer").html("Fermer");
        }
        naissanceEnfant.removeClass("styleErreur");
        niveauEntrainement.removeClass("styleErreurSelect");
        $.ajax({
          //url : "https://mr-ambang.com../functionHoraireEnfant.php",
          //Prend comme départ l'origine du nom de domaine ici: www.mr-ambang.com
          url: "../functionHoraireEnfant.php",
          type: "POST",
          data:
            "anneeNaissance=" +
            naissanceEnfantVal +
            "&niveau=" +
            niveauEntrainementVal,
          dataType: "html",
          success: function (code_html, statut) {
            //$(code_html).appendTo("#lieuEntrainementModal .modal-container .page");
            if (code_html != "") {
              $("#lieuEntrainementModal .modal-container .page .horaire").html(
                code_html
              );
              niveauEntrainement.removeClass("styleErreurSelect");
              $(".Fermer").html("Enregistrer");
              /*===============Debut Initilisation============*/
              if (Choix_1 != "") {
                if (choix2_ID == "") {
                  choix2_ID = "id_2_vide";
                }

                $("#" + choix1_ID).prop("checked", true);
                $("#" + choix1_ID).attr("name", "lieuEntrainement_1");
                $("#" + choix1_ID)
                  .parent()
                  .find("label:last-child span")
                  .addClass("choix1");
                $("#" + choix1_ID)
                  .parent()
                  .find("label:last-child span")
                  .html("Choix 1");

                $("input[type=checkbox]")
                  .not("#" + choix1_ID + ",#" + choix2_ID)
                  .prop("checked", false);
                $("input[type=checkbox]")
                  .not("#" + choix1_ID + ",#" + choix2_ID)
                  .attr("name", "lieuEntrainement");
                $("input[type=checkbox]")
                  .not("#" + choix1_ID + ",#" + choix2_ID)
                  .parent()
                  .find("label:last-child span")
                  .removeClass("choix1");
                $("input[type=checkbox]")
                  .not("#" + choix1_ID + ",#" + choix2_ID)
                  .parent()
                  .find("label:last-child span")
                  .html("");
              }

              if (Choix_2 != "") {
                if (choix1_ID == "") {
                  choix1_ID = "id_1_vide";
                }

                $("#" + choix2_ID).prop("checked", true);
                $("#" + choix2_ID).attr("name", "lieuEntrainement_2");
                $("#" + choix2_ID)
                  .parent()
                  .find("label:last-child span")
                  .addClass("choix2");
                $("#" + choix2_ID)
                  .parent()
                  .find("label:last-child span")
                  .html("Choix 2");

                $("input[type=checkbox]")
                  .not("#" + choix1_ID + ",#" + choix2_ID)
                  .prop("checked", false);
                $("input[type=checkbox]")
                  .not("#" + choix1_ID + ",#" + choix2_ID)
                  .attr("name", "lieuEntrainement");
                $("input[type=checkbox]")
                  .not("#" + choix1_ID + ",#" + choix2_ID)
                  .parent()
                  .find("label:last-child span")
                  .removeClass("choix2");
                $("input[type=checkbox]")
                  .not("#" + choix1_ID + ",#" + choix2_ID)
                  .parent()
                  .find("label:last-child span")
                  .html("");
              }

              if (Choix_1 == "") {
                $(
                  ".modal-lienEntrainement .page .horaire .radio label:last-child .choix1"
                )
                  .parent()
                  .parent()
                  .find("input[type=checkbox]")
                  .prop("checked", false);

                $(
                  ".modal-lienEntrainement .page .horaire .radio label:last-child .choix1"
                ).html("");
                $(
                  ".modal-lienEntrainement .page .horaire .radio label:last-child span"
                ).removeClass("choix1");
                $(
                  ".modal-lienEntrainement .page .horaire .radio label:last-child .choix1"
                )
                  .parent()
                  .parent()
                  .find("input[type=checkbox]")
                  .attr("name", "lieuEntrainement");
              }

              if (Choix_2 == "") {
                $(
                  ".modal-lienEntrainement .page .horaire .radio label:last-child .choix2"
                )
                  .parent()
                  .parent()
                  .find("input[type=checkbox]")
                  .prop("checked", false);

                $(
                  ".modal-lienEntrainement .page .horaire .radio label:last-child .choix2"
                ).html("");
                $(
                  ".modal-lienEntrainement .page .horaire .radio label:last-child span"
                ).removeClass("choix2");
                $(
                  ".modal-lienEntrainement .page .horaire .radio label:last-child .choix2"
                )
                  .parent()
                  .parent()
                  .find("input[type=checkbox]")
                  .attr("name", "lieuEntrainement");
              }

              /*===============Fin Initilisation============*/

              /*==============Limiter checked 2 choix===============*/
              $(".modal-lienEntrainement .page .horaire .radio label").on(
                "click",
                function () {
                  var choix_1 = $(nameLieuEntraiement)
                    .parent()
                    .find(".choix_1");
                  var choix_2 = $(nameLieuEntraiement)
                    .parent()
                    .find(".choix_2");

                  var countCheck = $(
                    ".modal-lienEntrainement .page .horaire .radio input[type=checkbox]:checked"
                  ).length;

                  if (
                    $(this)
                      .parent()
                      .find("label:last-child span")
                      .hasClass("choix1") == false
                  ) {
                    var checkBoxValue1 = $(this)
                      .parent()
                      .find("input[type=checkbox]")
                      .val();
                  }

                  var checkBoxValueChoix1 = $(
                    ".modal-lienEntrainement .page .horaire .radio label:last-child .choix1"
                  )
                    .parent()
                    .parent()
                    .find("input[type=checkbox]")
                    .val();

                  if (
                    $(this)
                      .parent()
                      .find("label:last-child span")
                      .hasClass("choix2") == false
                  ) {
                    var checkBoxValue2 = $(this)
                      .parent()
                      .find("input[type=checkbox]")
                      .val();
                  }

                  var checkBoxValueChoix2 = $(
                    ".modal-lienEntrainement .page .horaire .radio label:last-child .choix2"
                  )
                    .parent()
                    .parent()
                    .find("input[type=checkbox]")
                    .val();

                  if (countCheck >= 2) {
                    $(
                      ".modal-lienEntrainement .page .horaire .radio input[type=checkbox]"
                    )
                      .not(":checked")
                      .attr("disabled", "disabled");
                  } else {
                    $(
                      ".modal-lienEntrainement .page .horaire .radio input[type=checkbox]"
                    ).removeAttr("disabled");
                  }
                  /*==============Choix1 Choix2 Affichage==============*/
                  if (
                    countCheck == 0 &&
                    $(this)
                      .parent()
                      .find("input[type=checkbox]")
                      .prop("checked") == false &&
                    $(
                      ".modal-lienEntrainement .page .horaire .radio label:last-child span"
                    ).hasClass("choix1") == false
                  ) {
                    $(this)
                      .parent()
                      .find("label:last-child span")
                      .addClass("choix1");
                    $(this)
                      .parent()
                      .find("label:last-child span")
                      .html("Choix 1");
                    $(this)
                      .parent()
                      .find("input[type=checkbox]")
                      .attr("name", "lieuEntrainement_1");
                  } else {
                    $(this).parent().find("label:last-child span").html("");
                    $(this)
                      .parent()
                      .find("label:last-child span")
                      .removeClass("choix1 choix2");
                    $(this)
                      .parent()
                      .find("input[type=checkbox]")
                      .attr("name", "lieuEntrainement");
                  }

                  if (
                    countCheck == 1 &&
                    $(this)
                      .parent()
                      .find("input[type=checkbox]")
                      .prop("checked") == false &&
                    $(
                      ".modal-lienEntrainement .page .horaire .radio label:last-child span"
                    ).hasClass("choix2") == false
                  ) {
                    $(this)
                      .parent()
                      .find("label:last-child span")
                      .addClass("choix2");
                    $(this)
                      .parent()
                      .find("label:last-child span")
                      .html("Choix 2");
                    $(this)
                      .parent()
                      .find("input[type=checkbox]")
                      .attr("name", "lieuEntrainement_2");
                  }

                  if (
                    countCheck == 1 &&
                    $(this)
                      .parent()
                      .find("input[type=checkbox]")
                      .prop("checked") == false &&
                    $(
                      ".modal-lienEntrainement .page .horaire .radio label:last-child span"
                    ).hasClass("choix1") == false
                  ) {
                    $(this)
                      .parent()
                      .find("label:last-child span")
                      .addClass("choix1");
                    $(this)
                      .parent()
                      .find("label:last-child span")
                      .html("Choix 1");
                    $(this)
                      .parent()
                      .find("input[type=checkbox]")
                      .attr("name", "lieuEntrainement_1");
                    //choix_1.val(checkBoxValue1);
                    //alert("6="+countCheck);
                  }

                  /*==============Choix1 Choix2 Affichage==============*/
                  /*==============value Choix input====================*/
                  //inputLieuEntrainementData = $(nameLieuEntraiement).parent().find(".choix_1");
                  inputModalID = $(this)
                    .parent()
                    .find("input[type=checkbox]")
                    .attr("id");
                  CHOIX1 = $(nameLieuEntraiement)
                    .parent()
                    .find(".choix_1")
                    .attr("name");

                  /*==========Choix 1==========*/
                  if (
                    countCheck == 0 &&
                    $(this)
                      .parent()
                      .find("label:last-child span")
                      .hasClass("choix1") == true &&
                    $(
                      ".modal-lienEntrainement .page .horaire .radio label:last-child span"
                    ).hasClass("choix2") == false
                  ) {
                    choix_1.val(checkBoxValue1);
                    sessionStorage.setItem(CHOIX1, inputModalID);
                  }

                  if (
                    countCheck == 1 &&
                    $(this)
                      .parent()
                      .find("label:last-child span")
                      .hasClass("choix1") == false &&
                    $(
                      ".modal-lienEntrainement .page .horaire .radio label:last-child span"
                    ).hasClass("choix2") == false
                  ) {
                    choix_1.val("");
                    sessionStorage.setItem(CHOIX1, inputModalID);
                  }

                  if (
                    countCheck == 1 &&
                    $(this)
                      .parent()
                      .find("label:last-child span")
                      .hasClass("choix1") == true &&
                    $(
                      ".modal-lienEntrainement .page .horaire .radio label:last-child span"
                    ).hasClass("choix2") == true
                  ) {
                    choix_1.val(checkBoxValue1);
                    sessionStorage.setItem(CHOIX1, inputModalID);
                  }

                  if (
                    countCheck == 2 &&
                    $(this)
                      .parent()
                      .find("label:last-child span")
                      .hasClass("choix1") == false &&
                    $(
                      ".modal-lienEntrainement .page .horaire .radio label:last-child span"
                    ).hasClass("choix2") == true &&
                    $(
                      ".modal-lienEntrainement .page .horaire .radio label:last-child span"
                    ).hasClass("choix1") == false
                  ) {
                    choix_1.val("");
                    sessionStorage.setItem(CHOIX1, inputModalID);
                  }

                  if (
                    countCheck == 2 &&
                    $(this)
                      .parent()
                      .find("label:last-child span")
                      .hasClass("choix1") == false &&
                    $(
                      ".modal-lienEntrainement .page .horaire .radio label:last-child span"
                    ).hasClass("choix2") == true &&
                    $(
                      ".modal-lienEntrainement .page .horaire .radio label:last-child span"
                    ).hasClass("choix1") == true
                  ) {
                    choix_1.val(checkBoxValueChoix1);
                    sessionStorage.setItem(CHOIX1, inputModalID);
                  }

                  /*==========Choix 1==========*/

                  /*==========Choix 2==========*/
                  //inputLieuEntrainementData2 = $(nameLieuEntraiement).parent().find(".choix_2");
                  inputModalID2 = $(this)
                    .parent()
                    .find("input[type=checkbox]")
                    .attr("id");
                  CHOIX2 = $(nameLieuEntraiement)
                    .parent()
                    .find(".choix_2")
                    .attr("name");

                  if (
                    countCheck == 1 &&
                    $(this)
                      .parent()
                      .find("label:last-child span")
                      .hasClass("choix2") == true &&
                    $(
                      ".modal-lienEntrainement .page .horaire .radio label:last-child span"
                    ).hasClass("choix1") == true
                  ) {
                    choix_2.val(checkBoxValue2);
                    sessionStorage.setItem(CHOIX2, inputModalID2);
                  }

                  if (
                    countCheck == 2 &&
                    $(this)
                      .parent()
                      .find("label:last-child span")
                      .hasClass("choix2") == false &&
                    $(
                      ".modal-lienEntrainement .page .horaire .radio label:last-child span"
                    ).hasClass("choix1") == true
                  ) {
                    choix_2.val("");
                    sessionStorage.setItem(CHOIX2, inputModalID2);
                  }

                  if (
                    countCheck == 2 &&
                    $(this)
                      .parent()
                      .find("label:last-child span")
                      .hasClass("choix2") == false &&
                    $(
                      ".modal-lienEntrainement .page .horaire .radio label:last-child span"
                    ).hasClass("choix2") == true &&
                    $(
                      ".modal-lienEntrainement .page .horaire .radio label:last-child span"
                    ).hasClass("choix1") == true
                  ) {
                    choix_2.val(checkBoxValueChoix2);
                    sessionStorage.setItem(CHOIX2, inputModalID2);
                  }
                  /*==========Choix 2==========*/
                  /*==============value Choix input====================*/
                }
              );
              /*==============Limiter checked 2 choix===============*/
            } else if (code_html == "") {
              $(".modalite").html(
                "Ce niveau n'est pas accessible aux enfants de cet âge, veuillez effectuer une nouvelle sélection."
              );
              niveauEntrainement.addClass("styleErreurSelect");
            }
          },
          error: function (resultat, statut, erreur) {
            //alert(resultat.state());
          },
        });
      }
    });
  });
  /*========Foreach=======*/
});
