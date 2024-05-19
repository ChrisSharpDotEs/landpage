export const Card = {
    createCard: function (Nombre, content, n) {
        return `<div class="card mb-4 p-5 col-lg-4" data-toggle="modal" data-target="#exampleModal">
            <img src="img/pw.jpeg" class="card-img-top rounded-circle mx-auto d-block mt-3" alt="..."
                style="width: 250px">
                <div class="card-body text-center">
                    <h5 class="card-title">${Nombre}</h5>
                    <div class="row gap-2 justify-content-center my-4">
                        <div id="button_${n}" class="chartImg col-3" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
                                <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1z"/>
                            </svg>
                        </div>
                        <div id="" class="chartImg col-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
                                <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1z"/>
                            </svg>
                        </div>
                        <div id="" class="chartImg col-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
                                <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="container">
                <table class="table table-stripped table-hover">
                    <thead>
                        <th>Item 1</th>
                        <th>Item 2</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Value 1</td>
                            <td>Value 1</td>
                        </tr>
                        <tr>
                            <td>Value 1</td>
                            <td>Value 1</td>
                        </tr>
                    </tbody>
                </table>
                </div>
        </div>`;
    }
}