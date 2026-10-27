
$(document).ready(function () {

    $("#loadBooks").click(function () {

        $("#message").text("Loading books...");
        $("#bookTable").empty();

        $.ajax({
            url: "books.json",
            type: "GET",
            dataType: "json",

            success: function (books) {

                $.each(books, function (index, book) {

                    var row = "<tr>" +
                        "<td>" + book.id + "</td>" +
                        "<td>" + book.title + "</td>" +
                        "<td>" + book.price + "</td>" +
                        "</tr>";

                    $("#bookTable").append(row);
                });

                $("#message").text("Books loaded successfully!");
            },

            error: function () {
                $("#message").text(
                    "Unable to load books. Check the server and JSON file."
                );
            }
        });

    });

});
