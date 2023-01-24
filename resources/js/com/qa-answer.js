$(document).ready(function() {

    // -1 БАЛЛ
    $(".setBall").click(function() {

        // УСТАНОВКА ПЕРЕМЕННЫХ
        var TYPE = 'setBallAnswer';
        var TYPE_EDIT = $(this).attr('alt');
        var ID_COMMENT = $(this).attr('idcomment');

        var OBJ_IMG = $(this);
        var OBJ_BALL = $("#ballComment_" + ID_COMMENT);
        var BALL = Number(OBJ_BALL.html());
        var BALL_NEW = 0;

        OBJ_BALL.html("<img src='/images/loaders/10s.gif' />");

        var error = false;
        jQuery.post("/loader.php", {
            'TYPE': TYPE,
            'TYPE_EDIT': TYPE_EDIT,
            'ID': ID_COMMENT
        },
        function(data) {
            //alert(data);
            if (data == 'InArray') {
                OBJ_BALL.html("<img src='/images/icons/like_war.png'  />");
                OBJ_BALL.attr('title', 'Вы уже голосовали');
            } else if (data == 'errorDB') {
                OBJ_BALL.html("<img src='/images/icons/like_err.png'  />");
                OBJ_BALL.attr('title', 'Ошибка обновления оценки');

            } else if (data == 'OK') {
                OBJ_BALL.removeClass("comment_ballP").removeClass("comment_ballM");
                switch (TYPE_EDIT) {
                    case 'P':
                        BALL_NEW = BALL + 1;
                        break;
                    case 'M':
                        BALL_NEW = BALL - 1;
                        break;
                    default:
                        BALL_NEW = BALL - 1;
                        break;
                }

                if (BALL_NEW > 0) {
                    BALL_NEW = '+' + BALL_NEW;
                    OBJ_BALL.addClass("comment_ballP");
                } else if (BALL_NEW < 0) {
                    OBJ_BALL.addClass("comment_ballM");
                }

                OBJ_BALL.html(BALL_NEW);
            } else {
                OBJ_BALL.html("<img src='/images/icons/like_err.png'  />");
                OBJ_BALL.attr('title', 'Ошибка обновления оценки');
            }


        })
    });
});