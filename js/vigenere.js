const alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

function checkAndModify(input) {
    input = input.toUpperCase().replace(/\s+/g, '');
    if (!/^[A-Z]+$/.test(input)) {
        alert("Only letters A-Z allowed. No digits or special symbols are allowed.");
        return null;
    }
    return input;
}

function processVigenere(text, keyword, isEncrypt) {
    text = checkAndModify(text);
    keyword = checkAndModify(keyword);
    if (!text || !keyword) {
        return;
    }

    let resultText = '';
    let data = [];
    for (let i = 0, len = text.length; i < len; i++) {
        const char = text[i];
        const keyChar = keyword[i % keyword.length];
        const charIndex = alphabet.indexOf(char);
        const keyIndex = alphabet.indexOf(keyChar);
        const newIndex = isEncrypt ? (charIndex + keyIndex) % 26 : (charIndex - keyIndex + 26) % 26;
        const newChar = alphabet[newIndex];
        data.push({ char, keyChar, newIndex, newChar });
        resultText += newChar;
    }

    displayResult(data, isEncrypt);
    const displayArea = isEncrypt ? 'encrypted_text_display_area' : 'decrypted_text_display_area';
    document.getElementById(displayArea).value = resultText;
}

function displayResult(data, isEncrypt) {
    const containerId = isEncrypt ? 'tableContainer' : 'decryptionTableContainer';
    const container = document.getElementById(containerId);
    container.innerHTML = '';

    const headers = ['Text', 'Value', 'Key Text', 'Key Value', 'Result Value', 'Result Text'];
    let table = document.createElement('table');
    table.style.width = '100%';
    table.style.borderCollapse = 'collapse';

    let header = table.insertRow();
    headers.forEach(headerText => {
        let cell = header.insertCell();
        cell.innerText = headerText;
        cell.style.border = '1px solid black';
    });

    data.forEach(item => {
        let row = table.insertRow();
        let cells = [
            item.char,
            alphabet.indexOf(item.char),
            item.keyChar,
            alphabet.indexOf(item.keyChar),
            item.newIndex,
            item.newChar
        ];

        cells.forEach(cellData => {
            let cell = row.insertCell();
            cell.innerText = cellData;
            cell.style.border = '1px solid black';
        });
    });

    container.appendChild(table);
}

function vigenereEncryptAndDisplay() {
    const text = document.getElementById('plaintext_input').value;
    const keyword = document.getElementById('encryption_key').value;
    processVigenere(text, keyword, true);
}

function vigenereDecryptAndDisplay() {
    const text = document.getElementById('cipher_text_input').value;
    const keyword = document.getElementById('decryption_key').value;
    processVigenere(text, keyword, false);
}
function copyToClipboard(isEncrypt) {
    const textAreaId = isEncrypt ? 'encrypted_text_display_area' : 'decrypted_text_display_area';
    const textToCopy = document.getElementById(textAreaId).value;
    navigator.clipboard.writeText(textToCopy).then(function() {
        alert("Text successfully copied to clipboard");
    }, function(err) {
        alert("Failed to copy text: " + err);
    });
}

function resetOutput() {
    document.getElementById('tableContainer').innerHTML = '';
    document.getElementById('decryptionTableContainer').innerHTML = '';
    document.getElementById('encrypted_text_display_area').value = '';
    document.getElementById('decrypted_text_display_area').value = '';
}
