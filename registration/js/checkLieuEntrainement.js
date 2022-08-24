$(document).ready(function () {
  /*=============On click lieu Entrainement=========*/
  var lieuEntraiement = $(".lieuEntrainement");

  $.each(lieuEntraiement, function () {
    var niveau = $(this).parent().find(".niveau");

    /*=============On click lieu Entrainement=========*/

    /*=======Initialisation=======*/
    $(this).on("click", function () {
      nameLieuEntraiement = $(this);

      var valueNiveau = niveau.val();

      /*=====Valeur du choix 1 dans lieuEntrainement=====*/
      var Choix_1 = $(this).parent().find(".choix_1").val();
      /*=====Valeur du choix 2 dans lieuEntrainement=====*/
      var Choix_2 = $(this).parent().find(".choix_2").val();
      /*==========Name choix1 Enfant n ===================*/
      var nameChoix_1 = $(this).parent().find(".choix_1").attr("name");
      /*==========Name choix2 Enfant n ===================*/
      var nameChoix_2 = $(this).parent().find(".choix_2").attr("name");
      /*=======Session Choix 1====*/
      var choix1_ID = sessionStorage.getItem(nameChoix_1);
      //console.log(choix1_ID);
      var choix2_ID = sessionStorage.getItem(nameChoix_2);
      //console.log(choix2_ID);

      if (valueNiveau != "") {
        $(".horaire").addClass("none");
        $(".modal-lienEntrainement .page ." + valueNiveau).removeClass("none");
        $(".modalite").css("font-size", 14);

        if (valueNiveau == "self_defense") {
          $(".modalite").html(
            "Veuillez choisir jusqu'à 2 créneaux horaires parmi la liste ci-dessous par ordre de préférence.<br><br>"
          );
          $(".Fermer").html("Enregistrer");
        } else if (valueNiveau == "adultes") {
          $(".modalite").html(
            "Veuillez trouver ci-dessous les créneaux horaires des cours loisir.<br><br>"
          );
          $(".Fermer").html("Fermer");
        } else if (valueNiveau == "competition_adultes") {
          $(".modalite").html(
            "Veuillez trouver ci-dessous les créneaux horaires des compétiteurs adultes. Attention ces séances sont réservées aux athlètes sélectionnés par les entraineurs.<br><br>"
          );
          $(".Fermer").html("Fermer");
        }

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
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio label:last-child .choix1"
          )
            .parent()
            .parent()
            .find("input[type=checkbox]")
            .prop("checked", false);

          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio label:last-child .choix1"
          ).html("");
          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio label:last-child span"
          ).removeClass("choix1");
          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio label:last-child .choix1"
          )
            .parent()
            .parent()
            .find("input[type=checkbox]")
            .attr("name", "lieuEntrainement");
        }

        if (Choix_2 == "") {
          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio label:last-child .choix2"
          )
            .parent()
            .parent()
            .find("input[type=checkbox]")
            .prop("checked", false);

          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio label:last-child .choix2"
          ).html("");
          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio label:last-child span"
          ).removeClass("choix2");
          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio label:last-child .choix2"
          )
            .parent()
            .parent()
            .find("input[type=checkbox]")
            .attr("name", "lieuEntrainement");
        }
      } else {
        $(".horaire").addClass("none");
        $(".modalite").html(
          "Veuillez d'abord selectioner une&nbsp;tranche&nbsp;dâge."
        );
        $(".modalite").css("font-size", 13);
      }
    });
    /*=======Initialisation=======*/

    /*=========Limiter checked 2 choix=======================*/
  });

  /*===============Label========*/

  $(".modal-lienEntrainement .page .horaire .radio label").on(
    "click",
    function () {
      var niveau = $(nameLieuEntraiement).parent().find(".niveau");
      var valueNiveau = niveau.val();

      var choix_1 = $(nameLieuEntraiement).parent().find(".choix_1");
      var choix_2 = $(nameLieuEntraiement).parent().find(".choix_2");

      var countCheck = $(
        ".modal-lienEntrainement .page ." +
          valueNiveau +
          " .radio input[type=checkbox]:checked"
      ).length;

      if (
        $(this).parent().find("label:last-child span").hasClass("choix1") ==
        false
      ) {
        var checkBoxValue1 = $(this)
          .parent()
          .find("input[type=checkbox]")
          .val();
      }

      var checkBoxValueChoix1 = $(
        ".modal-lienEntrainement .page ." +
          valueNiveau +
          " .radio label:last-child .choix1"
      )
        .parent()
        .parent()
        .find("input[type=checkbox]")
        .val();

      if (
        $(this).parent().find("label:last-child span").hasClass("choix2") ==
        false
      ) {
        var checkBoxValue2 = $(this)
          .parent()
          .find("input[type=checkbox]")
          .val();
      }

      var checkBoxValueChoix2 = $(
        ".modal-lienEntrainement .page ." +
          valueNiveau +
          " .radio label:last-child .choix2"
      )
        .parent()
        .parent()
        .find("input[type=checkbox]")
        .val();

      if (valueNiveau != "") {
        if (countCheck >= 2) {
          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio input[type=checkbox]"
          )
            .not(":checked")
            .attr("disabled", "disabled");
        } else {
          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio input[type=checkbox]"
          ).removeAttr("disabled");
        }
        /*==============Choix1 Choix2 Affichage==============*/
        if (
          countCheck == 0 &&
          $(this).parent().find("input[type=checkbox]").prop("checked") ==
            false &&
          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio label:last-child span"
          ).hasClass("choix1") == false
        ) {
          $(this).parent().find("label:last-child span").addClass("choix1");
          $(this).parent().find("label:last-child span").html("Choix 1");
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
          $(this).parent().find("input[type=checkbox]").prop("checked") ==
            false &&
          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio label:last-child span"
          ).hasClass("choix2") == false
        ) {
          $(this).parent().find("label:last-child span").addClass("choix2");
          $(this).parent().find("label:last-child span").html("Choix 2");
          $(this)
            .parent()
            .find("input[type=checkbox]")
            .attr("name", "lieuEntrainement_2");
        }

        if (
          countCheck == 1 &&
          $(this).parent().find("input[type=checkbox]").prop("checked") ==
            false &&
          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio label:last-child span"
          ).hasClass("choix1") == false
        ) {
          $(this).parent().find("label:last-child span").addClass("choix1");
          $(this).parent().find("label:last-child span").html("Choix 1");
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
        inputModalID = $(this).parent().find("input[type=checkbox]").attr("id");
        CHOIX1 = $(nameLieuEntraiement).parent().find(".choix_1").attr("name");

        /*==========Choix 1==========*/
        if (
          countCheck == 0 &&
          $(this).parent().find("label:last-child span").hasClass("choix1") ==
            true &&
          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio label:last-child span"
          ).hasClass("choix2") == false
        ) {
          choix_1.val(checkBoxValue1);
          sessionStorage.setItem(CHOIX1, inputModalID);
        }

        if (
          countCheck == 1 &&
          $(this).parent().find("label:last-child span").hasClass("choix1") ==
            false &&
          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio label:last-child span"
          ).hasClass("choix2") == false
        ) {
          choix_1.val("");
          sessionStorage.setItem(CHOIX1, inputModalID);
        }

        if (
          countCheck == 1 &&
          $(this).parent().find("label:last-child span").hasClass("choix1") ==
            true &&
          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio label:last-child span"
          ).hasClass("choix2") == true
        ) {
          choix_1.val(checkBoxValue1);
          sessionStorage.setItem(CHOIX1, inputModalID);
        }

        if (
          countCheck == 2 &&
          $(this).parent().find("label:last-child span").hasClass("choix1") ==
            false &&
          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio label:last-child span"
          ).hasClass("choix2") == true &&
          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio label:last-child span"
          ).hasClass("choix1") == false
        ) {
          choix_1.val("");
          sessionStorage.setItem(CHOIX1, inputModalID);
        }

        if (
          countCheck == 2 &&
          $(this).parent().find("label:last-child span").hasClass("choix1") ==
            false &&
          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio label:last-child span"
          ).hasClass("choix2") == true &&
          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio label:last-child span"
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
        CHOIX2 = $(nameLieuEntraiement).parent().find(".choix_2").attr("name");

        if (
          countCheck == 1 &&
          $(this).parent().find("label:last-child span").hasClass("choix2") ==
            true &&
          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio label:last-child span"
          ).hasClass("choix1") == true
        ) {
          choix_2.val(checkBoxValue2);
          sessionStorage.setItem(CHOIX2, inputModalID2);
        }

        if (
          countCheck == 2 &&
          $(this).parent().find("label:last-child span").hasClass("choix2") ==
            false &&
          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio label:last-child span"
          ).hasClass("choix1") == true
        ) {
          choix_2.val("");
          sessionStorage.setItem(CHOIX2, inputModalID2);
        }

        if (
          countCheck == 2 &&
          $(this).parent().find("label:last-child span").hasClass("choix2") ==
            false &&
          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio label:last-child span"
          ).hasClass("choix2") == true &&
          $(
            ".modal-lienEntrainement .page ." +
              valueNiveau +
              " .radio label:last-child span"
          ).hasClass("choix1") == true
        ) {
          choix_2.val(checkBoxValueChoix2);
          sessionStorage.setItem(CHOIX2, inputModalID2);
        }
        /*==========Choix 2==========*/
        /*==============value Choix input====================*/
      }
    }
  );

  /*=========Limiter checked 2 choix=======================*/
});
