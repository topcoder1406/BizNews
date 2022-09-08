$(document).ready(function () {
    if (location.search.search('page') != -1) {
        document.getElementById('comments-section').scrollIntoView({ behavior: 'smooth' });
    }

    $('.reply-btn').click(function () {
        $('#tree-parent').val($(this).data('tree-id'));
        $('#parent-comment').val($(this).data('comment-id'));
        $('.reply-info').show();
        $('.reply-comment-link').attr('href', '#comment-' + $(this).data('comment-id'));
        $('.reply-comment-link').text('@' + $(this).data('username'));
        document.getElementById('leave-comment-section').scrollIntoView({ behavior: 'smooth' });
    });

    $('.cancel-reply').click(function () {
        $('.reply-info').hide();
        $('#tree-parent').val('');
        $('#parent-comment').val('');
    });
});
