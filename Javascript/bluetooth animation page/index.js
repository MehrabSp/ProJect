(function($) {
    var red = "#F86969";
    var green = "#5AE9BA";
    var color = green;
    var tlScreen1 = new TimelineMax();

    tlScreen1
        .add("start")
        .set("#Bubbles", { visibility: "visible" })
        .from("#bottom-bubbles", 4, { opacity: 0, y: 50, x: 40, ease: Elastic.easeOut.config(1, 0.8) })
        .from("#top-bubbles", 4, { opacity: 0, y: 50, x: 40, ease: Elastic.easeOut.config(1, 0.8) }, "start")
        .to("#btnClick", 3.5, { opacity: 1, y: -96, ease: Elastic.easeOut.config(1, 1) }, "-=3.5")

    $("#btnClick").mousedown(function() {
        $(this).css("box-shadow", "unset");
    });

    $("#btnClick").mouseup(function() {

        if (color == green) {
            $(this).css("box-shadow", "0 3px 20px 0 rgba(90,233,186,0.60)");
        } else {
            $(this).css("box-shadow", "0 3px 13px 0 rgba(248,105,105,0.60)");
        }


    });

    $("#restart").click(function() {
        tlScreen1.restart();
    });
    
    $(document).ready(function() {
        $("#title-holder").html(title);
        $("#message-holder").html(message);
    });

    if(invert == true){
        $(document).ready(function() {
            $("#title-holder").html(title);
            $("#message-holder").html(message);
            if (color == green) {
                tlScreen1.stop();

                $(".border-top").css("background-color", red);
                $("#blue-color").css("fill", red);
                $("#bluetooth").css("fill", "#D74747");
                $("#Bubbles ellipse").css("fill", red);
                $(".screen button").css({
                    'box-shadow': '0 3px 13px 0 rgba(248,105,105,0.60)',
                    'background-color': red,
                    'border-color': red
                });
                color = red;
                tlScreen1.restart();

            } else {
                tlScreen1.stop();
                $(".border-top").css("background-color", green);
                $("#blue-color").css("fill", green);
                $("#bluetooth").css("fill", "#fff");
                $("#Bubbles ellipse").css("fill", green);
                $(".screen button").css({
                    'box-shadow': '0 3px 20px 0 rgba(90,233,186,0.60)',
                    'background-color': green,
                    'border-color': green
                });
                color = green;
                tlScreen1.restart();
            }


        });
    }
})(jQuery);

// MRB