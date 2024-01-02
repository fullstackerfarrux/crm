document.addEventListener("DOMContentLoaded", function () {
    const openModal = document.querySelectorAll(".openModal");

    // Add click event listeners to each 'shop' element
    openModal.forEach((open) => {
        open.addEventListener("click", function (e) {
            var modal = document.getElementById("myModal");
            const id = e.target.id;

            if (e.target.id) {
                modal.style.display = "flex";
            }

            modal.addEventListener("click", function (event) {
                if (
                    event.target === modal ||
                    event.target.className === "close"
                ) {
                    modal.style.display = "none";
                }
            });

            document.addEventListener("keydown", function (event) {
                if (event.key === "Escape" && modal.style.display === "block") {
                    modal.style.display = "none";
                }
            });

            var btn = document.getElementById("btn");

            btn.addEventListener("click", function (e) {
                document.getElementById("input").value = id;
                
            });
        });
    });
});
