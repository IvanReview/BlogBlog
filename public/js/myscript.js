//стандартный код
$( document ).ready(function() {

    initUIEvents();

});

function initUIEvents() {
    $(".comment").on('click', function(){
        var currentComment = $(this).data("commentid");
        $("#commentactions-" + currentComment).slideDown("fast");
    });

    $(".commentLi").hover(function(){
        var currentComment = $(this).data("commentid");

        $("#comment-" + currentComment).stop().animate({opacity: "1", backgroundColor: "#f8f8f8", borderLeftWidth: "4px"},{duration: 100, complete: function() {}} );

    }, function () {
        var currentComment = $(this).data("commentid");
        $("#comment-" + currentComment).stop().animate({opacity: "1", backgroundColor: "#fff", borderLeftWidth: "1px"},{duration: 100, complete: function() {}} );
        $("#commentactions-" + currentComment).slideUp("fast");
    });

    $(".reply").on('click', function () {

        //добавление парент id в скрытое поле
        var parentID =  $(this).data("commentid");
        $('#comment_parent').val(parentID);

        //скрол вниз к форме
        $('html, body').animate({
            scrollTop: $("#formElem").offset().top  // класс объекта к которому приезжаем
        }, 1000); // Скорость прокрутки

        $('#message').focus();
        $('.comment-actions').stop().fadeOut('fast')

    })


}


//АВТОРСКИЙ код

//кнопка очистки формы
let clear = document.querySelector('#clearMessageButton');

clear.addEventListener('click', (e)=>{
    e.preventDefault();
    let result = document.querySelector('.message');
    result.value = '';
});

//добавление комментария
let formData = document.querySelector('#formElem');
formData.addEventListener('submit', function(event) {
    let promise = fetch('formData.action', {
        method: 'POST',
        body: new FormData(this),
    });
    promise.then(
        response => {
            return response.json();
        }
    ).then(
        text => {
            //если есть ошибки валидации
            if (text.hasOwnProperty('error')){
                let err = document.querySelector('.errors');
                err.insertAdjacentHTML('beforeEnd',"<br><strong>ERROR: </strong>"+ text.error.join("<br/>"));
                //убрать форму с ошибками
                err.style.display = "block";
                err.onclick = function () {
                    err.style.display = "none"
                }

                //если нет ошибок
            } else {

                //дочерний комментарий
                if (text.data.parent_id > 0){
                    const parent  = document.querySelector("#li-comment-"+ text.data.parent_id );
                    const comment = document.createElement('div');
                    comment.innerHTML = "<ul class='children'>"+text.comment+"</ul>"
                    parent.append(comment);
                    comment_parent.value=0;
                } else {
                    //родительский комментарий
                    const li  = document.createElement('li');
                    // возвращаем вид одного коммента и вставляем в li и далее вставляем в ul
                    li.innerHTML = text.comment;
                    formComments.append(li);
                }
            }
        }
    );
    //обнуление
    let result = document.querySelector('.message');
    result.value = '';
    event.preventDefault();
});


