function createCard(row) {
    // Create elements
    var card = document.createElement('div');
    card.classList.add('card', 'm-1');

    var cardRow = document.createElement('div');
    cardRow.classList.add('row', 'no-gutters', 'm-2');

    var imageCol = document.createElement('div');
    imageCol.classList.add('col-md-3');

    var imageLink = document.createElement('a');
    imageLink.href = '#';
    imageLink.title = 'voir profile';
    var image = document.createElement('img');
    image.classList.add('card-img');
    image.src = './assets/otherassets/default-pfp.jpg';
    image.style.width = '200px';
    image.alt = 'Card image cap';
    imageLink.appendChild(image);
    imageCol.appendChild(imageLink);

    var contentCol = document.createElement('div');
    contentCol.classList.add('col-md-9');

    var title = document.createElement('h3');
    title.classList.add('text-center');
    title.textContent = row['jobTitle'];

    var cardBody = document.createElement('div');
    cardBody.classList.add('card-body');

    var cardTitle = document.createElement('h5');
    cardTitle.classList.add('card-title');
    cardTitle.textContent = row['nom'] + ' ' + row['prenom'];

    var clientIDSpan = document.createElement('span');
    clientIDSpan.classList.add('clientID');

    cardTitle.appendChild(clientIDSpan);

    var cardText = document.createElement('p');
    cardText.classList.add('card-text');
    cardText.textContent = row['prof'];

    var buttonDiv = document.createElement('div');
    buttonDiv.classList.add('d-flex', 'justify-content-between');

    var cvLink = document.createElement('a');
    cvLink.href = "http://localhost/CV/" + row['path'].split("/").pop();;
    cvLink.download = row['nom'] + '_' + row['prenom'] + '_CV.pdf';
    cvLink.classList.add('btn', 'btn-primary', 'btn-sm');
    cvLink.textContent = 'Telecharger cv';

    var scorePara = document.createElement('p');
    if (row['score']) {
        scorePara.textContent = 'score : ' + row['score'];
    } else {
        scorePara.textContent = '';
    }

    // Assemble elements
    buttonDiv.appendChild(cvLink);
    buttonDiv.appendChild(scorePara);
    cardBody.appendChild(cardTitle);
    cardBody.appendChild(cardText);
    cardBody.appendChild(buttonDiv);
    contentCol.appendChild(title);
    contentCol.appendChild(cardBody);
    cardRow.appendChild(imageCol);
    cardRow.appendChild(contentCol);
    card.appendChild(cardRow);

    return card;
}

let score=0;

function getScore(id_client, preferences, callback) {
    let formData = {
        id_client: id_client,
        preferences: preferences
    };

    // Send the data using AJAX
    $.ajax({
        url: './server/cv.php', // Replace with your PHP script's URL
        type: 'GET',
        data: formData,
        contentType: 'application/json',
        success: function(response) {
            // Handle success
            console.log(response);
            let score = Number(response);
            // Call the callback function with the score
            callback(score);
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(xhr.responseText);
            // Call the callback function with an error indicator (e.g., null)
            callback(null);
        }
    });
}



function clearWrapper(wrapper) {
    if (wrapper) {
        while (wrapper.firstChild) {
            wrapper.removeChild(wrapper.firstChild);
        }
    } else {
        console.error("Wrapper element with id '" + wrapperId + "' not found.");
    }
}

function createBox(option, element) {
    var newBox = document.createElement("div");
    newBox.innerHTML = `
        <div class="col">
            <input type="text" name="option_${option}" value="${option}" readonly style="background-color:#99acb1;">
        </div>
        <div class="col">
            <input style="display: none;" placeholder="Formation/Langues/Experiences..." type="text" name="custom_${option}" />
            <input placeholder="Score" type="number" class="quantity-input" min="1" max="99" name="score_${option}"/>
        </div>
        `;
    newBox.classList.add("selected-box");
    document.getElementById("selectedBoxesContainer").appendChild(newBox);

    // Désactiver l'option sélectionnée
    element.querySelector(`option[value="${option}"]`).disabled = true;

}

function getFormCV() {
    // Now your function logic goes here
    var inputs = document.querySelectorAll("#selectedBoxesContainer input");
    let S = "";
    for (var i = 0; i < inputs.length; i++) {
        if (i % 3 == 2) {
            S += inputs[i].value + ";";
        } else {
            S += inputs[i].value + ",";
        }
    }
    console.log(S);
    return S;
}

function search(event, cand) {
    if (event) {
        event.preventDefault(); // Prevent default form submission behavior
    }
    let S = getFormCV(event);
    let updatedCandidates = [];

    // Define a function to handle the score retrieval for each candidate
    function handleScoreRetrieval(candidate) {
        getScore(candidate.id, S, function(score) {
            // Update the candidate's score
            candidate.score = score;
            console.log(candidate);
            updatedCandidates.push(candidate);

            // Check if scores are updated for all candidates
            if (updatedCandidates.length === cand.length) {
                // Once all scores are retrieved, update the UI
                let CondidatWrapper = document.getElementById("condidat-wrapper");
                clearWrapper(CondidatWrapper);

                updatedCandidates.forEach(element => {
                    console.log(element.score)
                    if(element.score !== 0){
                        var card = createCard(element);
                        CondidatWrapper.appendChild(card);    
                    }
                });

            }
        });
    }

    // Call handleScoreRetrieval for each candidate
    cand.forEach(candidate => {
        handleScoreRetrieval(candidate);
    });
}


function submitForm() {
    document.getElementById("formData").submit(); // Submit the form
}





function main(condidats) {
    let CondidatWrapper = document.getElementById("condidat-wrapper")
    clearWrapper(CondidatWrapper);
    console.log(condidats);
    condidats.forEach(element => {
        var card = createCard(element);
        CondidatWrapper.appendChild(card);
    });
}