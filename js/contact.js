document.addEventListener("DOMContentLoaded", () => {

    // variables
    const form = document.querySelector("#contactForm");
    const submitLink = document.querySelector("#contactSubmit");

    // create alert box
    const alertBox = document.createElement("div");
    alertBox.style.margin = "20px 0";
    form.parentNode.insertBefore(alertBox, form);

    // submit form
    const submitForm = async () => {
        const formData = new FormData(form);

        try {
            const response = await fetch(form.action, {
                method: "POST",
                body: formData
            });

            const text = await response.text();

            if (text.includes("success")) {
                alertBox.innerHTML = `
                    <div style="background-color: #28a745; color: #fff; padding: 12px; border-radius: 5px;
                                text-align: center; font-size: 16px; font-weight: bold;">
                        ✅ Successfully sent
                    </div>
                `;

                setTimeout(() => {
                    form.submit();
                }, 2000);

            } else {
                alertBox.innerHTML = `
                    <div style="background-color: #dc3545; color: #fff; padding: 12px; border-radius: 5px;
                                text-align: center; font-size: 16px; font-weight: bold;">
                        ❌ Please fill all fields
                    </div>
                `;
            }

            setTimeout(() => {
                alertBox.innerHTML = "";
            }, 4000);

        } catch (error) {
            alertBox.innerHTML = `
                <div class="alert alert-danger bg-dark text-light text-center">
                    ⚠️ Error sending message
                </div>
            `;
            console.error("Error:", error);

            setTimeout(() => {
                alertBox.innerHTML = "";
            }, 4000);
        }
    };

    // submit
    submitLink.addEventListener("click", (e) => {
        e.preventDefault();
        submitForm();
    });

});
