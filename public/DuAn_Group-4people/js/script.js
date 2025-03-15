
// const successA = document.querySelector('#successA');
// successA.addEventListener('click',function(){
//     Swal.fire({
//         icon: 'success',
//         title: 'Xin chào',
//         text: 'Đăng ký thành công',
//         timer: 2000
//     })
// })

document.addEventListener('DOMContentLoaded', () => {
    const mainImage = document.getElementById('main-image');
    const thumbnails = document.querySelectorAll('.thumbnail');

    thumbnails.forEach((thumbnail) => {
        thumbnail.addEventListener('click', () => {
            const currentMainImageSrc = mainImage.src;
            mainImage.src = thumbnail.src;
            thumbnail.src = currentMainImageSrc;
        });
    });
});
