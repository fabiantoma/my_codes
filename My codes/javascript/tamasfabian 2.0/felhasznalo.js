$(document).ready(function() {
  var area = "Kerület";
  $("#area").change(function() {
    area = $("#area").val();
    setVisibility();
  });
  $("#open").click(function() {
    if ($("#panelBox").is(":checked")) {
      $("#panel").slideToggle("slow");
    } else {
      alert("A panel nem lenyitható");
    }
  });
  $("#start").click(function() {
    $("#combobox").show(1000);
  });

  $("#count").click(function() {
    var aOldal = Number($("#aOldal").val());
    var bOldal = Number($("#bOldal").val());
    var cOldal = Number($("#cOldal").val());
    var M = Number($("#M").val());
    var kerulet = 0;
    var terulet = 0;
    setImage();
    switch (area) {
      case "Kerület":
        if ((bOldal === cOldal, aOldal === bOldal)) {
          kerulet = aOldal + bOldal + cOldal;
          $("#haromszogek").text("Egyenlő oldalú háromszög");
        } else if (bOldal === cOldal) {
          kerulet = aOldal + bOldal + cOldal;
          $("#haromszogek").text("Egyenlő szárú háromszög");
        } else {
          kerulet = aOldal + bOldal + cOldal;
          $("#haromszogek").text("Szabálytalan háromszög");
        }

        break;
      case "Terület":
        if ((bOldal === cOldal, aOldal === bOldal)) {
          terulet = (aOldal * M) / 2;
          $("#haromszogek").text("Egyenlő oldalú háromszög");
        } else if (bOldal === cOldal) {
          terulet = (aOldal * M) / 2;
          $("#haromszogek").text("Egyenlő szárú háromszög");
        } else {
          terulet = (aOldal * M) / 2;
          $("#haromszogek").text("Szabálytalan háromszög");
        }

        break;
      default:
        break;
    }
    $("#kerulet").text(kerulet + "cm");

    $("#terulet").text(terulet + "cm2");
    function setImage() {
      if ((aOldal === bOldal, cOldal === aOldal)) {
        $("#shapeImage").attr("src", "pictures/egyenlo_oldalu.png");
      } else if (bOldal === cOldal) {
        $("#shapeImage").attr("src", "pictures/egyenlo_szaru.png");
      } else {
        $("#shapeImage").attr("src", "pictures/szabalytalan.png");
      }
    }
  });
  function setVisibility() {
    if (area === "Kerület") {
      $("#secondData").hide();
    } else {
      $("#secondData").show();
    }
  }

  $("#close").click(function() {
    $("#panel").slideToggle("slow");
  });
});
$(document).ready(function() {
  $("#mySelect").change(function() {
    if ($("#yellow").is(":selected")) {
      $("#panel").css({ "background-color": "yellow" });
    } else if ($("#lightgrey").is(":selected")) {
      $("#panel").css({ "background-color": "lightgrey" });
    } else if ($("#lightblue").is(":selected")) {
      $("#panel").css({ "background-color": "lightblue" });
    }
  });
});
