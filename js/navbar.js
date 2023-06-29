// Get the current URL path
        var path = window.location.pathname;

        // Extract the page name from the URL
        var page = path.split("/").pop();

        // Remove the file extension if present
        page = page.replace(".html", "");

        // Find the corresponding navbar link and add the 'active' class
        var navbarLinks = document.getElementsByClassName("navbar")[0].getElementsByTagName("a");
        for (var i = 0; i < navbarLinks.length; i++) {
            var link = navbarLinks[i];
            var href = link.getAttribute("href").replace("#", "");
            if (href === page) {
                link.classList.add("active");
                break;
            }
        }
