$(document).ready(() => {
    $('#author').on('change', () => {
        let id = $('#author').val();
        $.ajax({
            url: '/manager/manager/author-book',
            dataType: 'html',
            data: {
                id: id
            },
            success: (res) => {
                $('#author_books').html(res);
            },
            fail: (e) => console.log(e)
        });
    })
});

function send() {
    let book = $('#book').val(),
        average_mark = $('#average_mark').val(),
        status = false;

    if (book === '' || average_mark === '') {
        alert('Обязательные поля не заполнены');
        status = false;
    } else {
        status = true;
    }

    if (average_mark >= 1 && average_mark <= 5 ) {
        status = true;
    } else {
        alert('Средняя оценка должна быть от 1 до 5');
        status = false;
    }

    if (status) {
        $.ajax({
            url: '/manager/manager/save-review',
            method: 'POST',
            data: {
                book_id: book,
                average_mark: average_mark
            },
            success: (res) => {
                if (res === 'ok') {
                    alert('Вы успешно оставили отзыв')
                } else {
                    alert('Ваш отзыв по какой то причне не отправился')
                }
            },
            fail: e => console.log(e)
        });
    }



}