
    function searchProducts() {
        var searchQuery = document.getElementById("searchInput").value;
            $.ajax({
                type: "POST",
                url: "/TP/search.php",
                data: { searchQuery: searchQuery },
                success: function(response) {
                    $("#table").html(response);
                }
            });
    }
