$(function () {
  let race = $("#race");
  let startOver = $("#startOver");
  let track = $("#track");
  let car1 = $("#car1");
  let car2 = $("#car2");
  let car1LocalStorage = localStorage.getItem("car1");
  let car2LocalStorage = localStorage.getItem("car2");
  let car1TimeLocalStorage = localStorage.getItem("car1Time");
  let car2TimeLocalStorage = localStorage.getItem("car2Time");
  let width = $(window).width() - car1.width();

  let isRaceOver = false;
  place = "first";

  let resultTable = (body, carTime, color) => {
    $(body).prepend(
      `<tr>
  <td>Finished in: <span class='${color} font-weight-bold h5'>${place}</span> place with a time of <span class='${color} font-weight-bold h5'>${carTime}</span> milliseconds!</td>
  </tr>`
    );
  };

  let raceIsOver = () => {
 
    if (!isRaceOver) {
      isRaceOver = true;
      track.prepend('<div class="overlay"></div>');
      track
        .append('<img src="./img/finish.gif" alt="" class="flag" />')
        .fadeIn(4000);
    } else {
      isRaceOver = false;
      place = "second";
      startOver.removeAttr("disabled");
  
    }
  };

  if (
    car1LocalStorage &&
    car2LocalStorage &&
    car1TimeLocalStorage &&
    car2TimeLocalStorage
  ) {
    $("#res").append(
      `<div class="col-12 pl-3 pl-md-5 pb-xl-5 pb-lg-4 pb-md-5">
  <h3 class="mb-3 mb-md-0 pb-xl-3 pb-md-1">
  Results from the previous time you played this game:
  </h3>
  </div>
  <div class="col-12 pl-3 pl-md-5">
  <table class="table">
  <tbody>
  <tr>
  <td><span class='c1Color font-weight-bold h5'>Car 1</span> finished in <span class='c1Color font-weight-bold h5'>${car1LocalStorage}</span> place, with a time of <span class='c1Color font-weight-bold h5'>${car1TimeLocalStorage}</span> milliseconds!</td>
  </tr>
  <tr>
  <td><span class='c2Color font-weight-bold h5'>Car 2</span> finished in <span class='c2Color font-weight-bold h5'>${car2LocalStorage}</span> place, with a time of <span class='c2Color font-weight-bold h5'>${car2TimeLocalStorage}</span> milliseconds!</td>
  </tr>
  </tbody>
  </table>
  </div>`
    );
  }
  

  race.on("click", function () {
 
    random1 = Math.floor(Math.random() * 4000) + 1000;
    random2 = Math.floor(Math.random() * 4000) + 1000;

    localStorage.setItem("car1Time", random1);
    localStorage.setItem("car2Time", random2);

  
    $("#track").prepend('<div class="overlay"></div>');

    const overlay = $(".overlay");
    let c = 4;

    $("#counter").text(c);

    const id = setInterval(function () {
      c--;
      overlay.html(`<span class='count'>${c}</span>`);

      if (c === 0) {
        clearInterval(id);
        overlay.remove();
        

        car1.animate({ left: `+=${width}` }, random1, function () {
          raceIsOver();
          resultTable(".c1Body", random1, "c1Color");
          localStorage.setItem("car1", place);
        });

        car2.animate({ left: `+=${width}` }, random2, function () {
          raceIsOver();
          resultTable(".c2Body", random2, "c2Color");
          localStorage.setItem("car2", place);
        });
        
      }
    }, 1000);
    $(this).attr('disabled', true);
   
  });

  startOver.click(function (e) {
    car1.css("left", "0");
    car2.css("left", "0");
    $(".flag").fadeOut();
    $(".overlay").remove();
    race.removeAttr("disabled")
    $(this).attr("disabled", true);
    place = "first";
  });
});
