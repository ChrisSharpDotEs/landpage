export const Card = {
    createCard: function (title, content, n) {
        return `<div class="card mb-4 p-5 col-lg-4" data-toggle="modal" data-target="#exampleModal">
            <img src="img/pw.jpeg" class="card-img-top rounded-circle mx-auto d-block mt-3" alt="..."
                style="width: 250px">
                <div class="card-body text-center">
                    <h5 class="card-title">${title}</h5>
                    <p class="card-text">
                        ${content}
                    </p>
                    <button id="button_${n}" type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" value="${n}">
                        Consultar
                    </button>
                </div>
        </div>`;
    }
}