let id;

function loadCar() {
    $.ajax({
        // Festlegung welche Art von Request
        type: 'POST',
        // Url wird gesetzt: Abfrage der ID vom Server
        url: '../src/ajax/getID.php',
        // Wenn kein Fehler ist wird success ausgeführt
        success: function (resp) {
            // ID wird gesetzt mit dem Wert von Response
            id = resp;
            // Erneuter Ajax Aufruf
            $.ajax({
                type: 'POST',
                url: '../src/ajax/getCarById.php',
                // Daten zur Übertragung setzen
                data: {
                    id: id
                },
                success: function(resp) {
                    // Bei Erfolgreicher Abfrage der Daten wird die Funktion createDetailedCarTile ausgeführt
                    createDetailedCarTile(resp);
                }
            })
        },
        // Wenn ein Fehler auftritt, wird standardmäßige Fehlerbehandlung ausgeführt
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    })
}

function getEmission() {
    $.ajax({
        // Festlegung welche Art von Request
        type: 'POST',
        // Url wird gesetzt: Abfrage der ID vom Server
        url: '../src/ajax/getID.php',
        // Wenn kein Fehler ist wird success ausgeführt
        success: function (resp) {
            // ID wird gesetzt mit dem Wert von Response
            id = resp;
            // Erneuter Ajax Aufruf
            $.ajax({
                type: 'POST',
                url: '../src/ajax/getEmissionById.php',
                // Daten zur Übertragung setzen
                data: {
                    id: id
                },
                success: function(resp) {
                    // Bei Erfolgreicher Abfrage der Daten wird die Funktion createDetailedEmissionTile ausgeführt
                    createDetailedEmissionTile(resp);
                }
            })
        },
        // Wenn ein Fehler auftritt, wird standardmäßige Fehlerbehandlung ausgeführt
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}

/**
 * Erstellt ein Emissions-Element 
 * @param {string} resp Emissionsdaten in JSON Format
 */
function createDetailedEmissionTile(resp) {
    // Übergebenen String in JSON parsen
    let obj = JSON.parse(resp);

    // Elemente im HTML Code selektieren und deren Wert setzen
    document.getElementById('vi').value = obj.NEFZ.VerbrauchInnerorts;
    document.getElementById('va').value = obj.NEFZ.VerbrauchAußerorts;
    document.getElementById('vk').value = obj.NEFZ.VerbrauchKombiniert;
    document.getElementById('nefz_co').value = obj.NEFZ.CO2EmissionenKombiniert;
    document.getElementById('sehrschnell').value = obj.WLTP.SehrSchnell;
    document.getElementById('schnell').value = obj.WLTP.Schnell;
    document.getElementById('langsam').value = obj.WLTP.Langsam;
    document.getElementById('wltp_co').value = obj.WLTP.CO2EmissionenKombiniert;

}

/**
 * Erstellt die detaiilierte Ansicht
 * @param {string} resp Daten aus der Zulassungsbescheinugung in JSON Format
 */
function createDetailedCarTile(resp) {
    // Übergebenen String in JSON parsen
    let obj = JSON.parse(resp).Zulassungsbescheinigung;
    // Elemente im HTML Code selektieren und deren Wert setzen
    document.getElementById("erstzulassung").value = obj.DatumDerErstzulassung;
    document.getElementById("hschluessel").value = obj.Herstellerschluesselnummer;
    document.getElementById("typschluessel").value = obj.Typschluesselnummer;
    document.getElementById("fahrzeugklasse").value = obj.Fahrzeugklasse;
    document.getElementById("aufbau").value = obj.ArtdesAufbaus;
    document.getElementById("marke").value = obj.Marke;
    document.getElementById("tvv").value = obj.TypVarianteVersion;
    document.getElementById("hersteller").value = obj.HerstellerKurzbezeichnung;
    document.getElementById("bezeichnung").value = obj.BezeichnungFahrzuegklasseAufbau;
    document.getElementById("schadstoffklasse").value = obj.Schadstoffklasse;
    document.getElementById("emissionsklasse").value = obj.Emissionsklasse;
    document.getElementById("kraftstoffart").value = obj.KraftstoffartEnergiequelle;

}

/**
 * Erstellt das Element Auto
 * @param {string} param 
 */
function createCarTile(param) {
    // Erstelle Variable Element und setze Handle auf car-container
    let element = document.getElementById("car-container")

    // Erstelle HTML Elemente
    let c = document.createElement("div");
    let img = document.createElement("img");
    let cb = document.createElement("div");
    let h = document.createElement("h5");
    let p = document.createElement("p");
    let a = document.createElement("a");
    let a2 = document.createElement("a");

    // Setze class von cb auf card body
    cb.className = "card-body";

    // Setze class von h auf card-title
    h.className = "card-title";
    // Setzte Inhalt von H auf Marke des übergebenen Fahrzeugs
    h.innerHTML = param.Zulassungsbescheinigung.Marke;

    // Setze class von p auf card-text
    p.className = "card-text";
    // Setze Inhalt von p auf TypVarianteVerion des übergebenen Fahrzeugs
    p.innerHTML = param.Zulassungsbescheinigung.TypVarianteVersion;

    // Setze class a auf btn
    a.className = "btn btn-primary";
    // Setze den Inhalt von a auf Mehr Infos
    a.innerHTML = "Mehr Infos";
    // Erstelle Link auf car.php mit Parameter ID = TypVarianteVersion
    a.href = "/public/car.php?id=" + param.Zulassungsbescheinigung.TypVarianteVersion;

    // Setze class a2 auf btn
    a2.className = "btn btn-primary";
    // Setze den Inhalt von a2 auf Emissionen
    a2.innerHTML = "Emissionen";
    // Erstelle Link auf emissions.php mit Parameter ID = TypVarianteVersion
    a2.href = "/public/emissions.php?id=" + param.Zulassungsbescheinigung.TypVarianteVersion;


    // Füge Elemente h,p,a,a2 an cb an
    cb.appendChild(h);
    cb.appendChild(p);
    cb.appendChild(a);
    cb.appendChild(a2);

    // Setze class von img auf card-img-top
    img.className = "card-img-top";
    // Bildquelle dynamisch auf Marke des Autos setzen
    img.src = "../src/images/" + param.Zulassungsbescheinigung.Marke + ".png";
    // Setze Alternativtext
    img.alt = "...";
    // Setze feste Höhe und Breite
    img.setAttribute("width", "100px");
    img.setAttribute("height", "150px");

    // Setze class von c
    c.className = "card";
    // Abseits vom eigentlichen Bootstrap die Breite des c Elements setzen
    c.style = "width: 18rem;";

    // Füge Elemente img,cb an c an
    c.appendChild(img);
    c.appendChild(cb);

    // Füge Element c an eigentliches Element an
    element.appendChild(c);

}


function getAllCars() {
    $.ajax({
        // Festlegung welche Art von Request
        type: 'POST',
        // Url wird gesetzt: Abfrage der ID vom Server
        url: '../src/ajax/getAllCars.php',
        // Wenn kein Fehler ist wird success ausgeführt
        success: function (resp) {
            // Iteriere durch Rückgabe der Funktion und erstelle pro Element ein Auto Element
            JSON.parse(resp).forEach(element => {
                createCarTile(element);
            });
        },
        // Wenn ein Fehler auftritt, wird standardmäßige Fehlerbehandlung ausgeführt
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}

function getCarById(id) {
    $.ajax({
        // Festlegung welche Art von Request
        type: 'POST',
        // Url wird gesetzt: Abfrage der ID vom Server
        url: '../src/ajax/getCarById.php',
        // Wenn kein Fehler ist wird success ausgeführt
        success: function (resp) {
            createCarTile(JSON.parse(resp));
        },
        // Daten zur Übertragung setzen
        data: {
            id: id
        },
        // Wenn ein Fehler auftritt, wird standardmäßige Fehlerbehandlung ausgeführt
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}

function getAllEmissions() {
    $.ajax({
        // Festlegung welche Art von Request
        type: 'POST',
        // Url wird gesetzt: Abfrage der ID vom Server
        url: '../src/ajax/getAllEmissions.php',
        // Wenn kein Fehler ist wird success ausgeführt
        success: function (resp) {
            createEmission(resp);
        },
        // Wenn ein Fehler auftritt, wird standardmäßige Fehlerbehandlung ausgeführt
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}

function getBy() {
    // Lies Formulardaten mithilfe von JQuery ($) aus
    let params = JSON.stringify($('form').serialize());
    // Festlegung welche Art von Request
    $.ajax({
        type: 'POST',
        // Url wird gesetzt: Abfrage der ID vom Server
        url: '../src/ajax/getAllCarsByParams.php',
        // Daten zur Übertragung setzen
        data: {
            params: params
        },
        // Wenn kein Fehler vorhanden ist wird success ausgeführt
        success: function(resp) {
            // Lösche Inhalt von Car-Container
            document.getElementById('car-container').innerHTML = ""
            // Gehe alle Elemente in resp durch
            JSON.parse(resp).forEach(element => {
                // Erstelle für jedes Element eine Autokachel
                createCarTile(element);
            });
        },
        // Wenn ein Fehler auftritt, wird standardmäßige Fehlerbehandlung ausgeführt
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });

}

function createEmission(data) {
    
    JSON.parse(data).forEach(element => {
        // Erstelle HTML Elemente
        let tr = document.createElement('tr');
        let td1 = document.createElement('td');
        let td2 = document.createElement('td');
        let td3 = document.createElement('td');
        let td4 = document.createElement('td');
        let td5 = document.createElement('td');
        let td6 = document.createElement('td');
        let td7 = document.createElement('td');
        let td8 = document.createElement('td');
        let td9 = document.createElement('td');
        let td10 = document.createElement('td');

        // Setze den Inner Text 
        td1.innerText = element['TypVarianteVersion'];
        td2.innerText = element['HerstellerKurzbezeichnung'];
        td3.innerText = element.NEFZ['VerbrauchInnerorts'];
        td4.innerText = element.NEFZ['VerbrauchAußerorts'];
        td5.innerText = element.NEFZ['VerbrauchKombiniert'];
        td6.innerText = element.NEFZ['CO2EmissionenKombiniert'];
        td7.innerText = element.WLTP['SehrSchnell'];
        td8.innerText = element.WLTP['Schnell'];
        td9.innerText = element.WLTP['Langsam'];
        td10.innerText = element.WLTP['CO2EmissionenKombiniert'];

        // Füge Elemente td1, td2, td3, td4, td5, td6, td7, td8, td9, td10 an tr an
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tr.appendChild(td5);
        tr.appendChild(td6);
        tr.appendChild(td7);
        tr.appendChild(td8);
        tr.appendChild(td9);
        tr.appendChild(td10);

        // Elemente im HTML Code selektieren und deren Wert setzen
        document.getElementById('emission').appendChild(tr);
    });
}