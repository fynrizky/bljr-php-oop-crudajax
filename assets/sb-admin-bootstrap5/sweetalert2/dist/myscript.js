/* jQuery Code */
// const flashData = $(".flash-data").data("flashdata");

// if (flashData) {
//     Swal.fire({
//         title: "Success ",
//         text: "Data " + flashData,
//         icon: "success",
//     });
// }

/* Javascript Code */
const flashData = document
    .querySelector(".flash-data")
    .getAttribute("data-flashdata");
if (flashData) {
    Swal.fire({
        title: "Success ",
        text: "Data " + flashData,
        icon: "success",
    });
}
