$(document).ready(function () {
  $(".file").click(function () {
    $(this)
      .find("input[type=file]")
      .on("change", function () {
        $(this).next("label").addClass("fileOk");
        $(this).next("label").html("Fichier selectionné");
      });
  });
});
