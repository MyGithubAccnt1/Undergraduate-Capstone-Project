function ShowYouMayLike() {
    $.ajax({
        url: "./php/get_you_may_like.php",
        method: "GET",
        success: function (data) {
            data = data.trim();
            $("#you_may_like-container").html(data);
        }
    });
}
ShowYouMayLike();
setInterval(ShowYouMayLike, 30000);

function handleIntersection(entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            if (entry.target.id === 'product-container') {
                
            } else if (entry.target.id === 'you_may_like-container') {
                $.ajax({
                    url: "./php/get_you_may_like.php",
                    method: "GET",
                    success: function (data) {
                        data = data.trim();
                        $("#you_may_like-container").html(data);
                    }
                });
            }
        }
    });
}

const observerYoumaylikeContainer = new IntersectionObserver(handleIntersection, {
    threshold: 0.165,
});
const youmaylikeContainerElement = document.getElementById('you_may_like-container');
observerYoumaylikeContainer.observe(youmaylikeContainerElement);