<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300..700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Wet+Paint&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style02.css">
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>

    <title>Playfair Cipher</title>
</head>

<body>
    <main>

        <div class="d-flex justify-content-center">
            <select name="" id="algo_select" class="btn btn-secondary btn-lg">
                <option value="PLAYFAIR">Playfair Cipher</option>
                <option value="VIGENERE">Vigenere Cipher</option>
            </select>
        </div>
          
        <header>
            <h1 id="title">Playfair Cipher</h1>
        </header>

        <section id="playfair" class="">
            <ul class="nav nav-pills nav-light mb-3 justify-content-center gap-4" id="pills-tab" role="tablist">
                <li class="nav-item flex-grow-1" role="presentation">
                    <button class="button active w-100" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">Playfair Cipher Details</button>
                </li>
                <li class="nav-item flex-grow-1" role="presentation">
                    <button class="button w-100" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">Encoding</button>
                </li>
                <li class="nav-item flex-grow-1" role="presentation">
                    <button class="button w-100" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">Decoding</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content_box">
                        <div class="mx-5">
                        <h2><b><>Playfair Cipher:</b></h2>
                        <p>The Playfair cipher was the first practical digraph substitution cipher. The scheme was invented in 1854 by Charles Wheatstone but was named after Lord Playfair who promoted the use of the cipher. In playfair cipher unlike traditional cipher we encrypt a pair of alphabets(digraphs) instead of a single alphabet. <br>
                        It was used for tactical purposes by British forces in the Second Boer War and in World War I and for the same purpose by the Australians during World War II. This was because Playfair is reasonably fast to use and requires no special equipment.</p><br>
                        <h3><><b>Encryption:</b></h3>
                        <ol>
                            <li><b>Key Generation:</b></li>
                            <ul>
                                <li>Choose a keyword (omitting duplicate letters and then filling the remaining alphabets of the grid in order).</li>
                            </ul>
                            <li><b>Grid Formation:</b></li>
                            <ul>
                                <li>Create a 5x5 grid using the unique letters of the keyword and the rest of the alphabet (I and J together).</li>
                            </ul>
                            <li><b>Message Preparation:</b></li>
                            <ul>
                                <li>Break the plaintext into pairs of letters.</li>
                                <li>If the two letters in a pair are the same, a bogus letter (commonly 'Z') is inserted to separate them</li>
                                <li>If there's an odd number of letters, add a bogus letter (commonly 'Z') at the end.</li>
                            </ul>
                            <li><b>Letter Transformation Rules:</b></li>
                            <ul>
                                <li>If the two letters in a pair are located in the same row of the secret key, the corresponding encrypted character for each letter is the next letter to the right in the same row (with wrapping to the beginning of the row if the plaintext letter is the last character in the row).</li>
                                <li>If the two letters in a pair are located in the same column of the secret key, the corresponding encrypted character for each letter is the letter beneath it in the same column (with wrapping to the beginning of the column if the plaintext letter is the last character in the column).</li>
                                <li>If the two letters in a pair are not in the same row or column of the secret, the corresponding encrypted character for each letter is a letter that is in its own row but in the same column as the other letter.</li>
                            </ul>
                            <li><b>Ciphertext Generation:</b></li>
                            <ul>
                                <li>The resulting pairs of letters are the ciphertext.</li>
                            </ul>
                        </ol>
                        <br>
                        <h4><b><>Example of Playfair Cipher Ecryption:</b></h4>
                        <div class="Encryption_Example">
                            <hr>
                            <h4>1. Input Keyword.</h4>
                            <img src="/image/Playfair_Encryption/Keyword_input.png" alt="">
                            <hr>
                            <hr>
                            <h4>2. Grids Generate.</h4>
                            <img src="/image/Playfair_Encryption/gridGenerate.png" alt="">
                            <hr>
                            <hr>
                            <h4>3. Input Plaintext.</h4>
                            <img src="/image/Playfair_Encryption/input_plainText.png" alt="">
                            <hr>
                            <h4>4. Plaintext Pairs.</h4>
                            <img src="/image/Playfair_Encryption/GridPair01.png" alt="">
                            <hr>
                            <hr>
                            <img src="/image/Playfair_Encryption/GridPair02.png" alt="">
                            <hr>
                            <hr>
                            <img src="/image/Playfair_Encryption/03.png" alt="">
                            <hr>
                            <hr>
                            <img src="/image/Playfair_Encryption/GridPari04.png" alt="">
                            <hr>
                            <hr>
                            <img src="/image/Playfair_Encryption/GridPari05.png" alt="">
                            <hr>
                            <hr>
                            <img src="/image/Playfair_Encryption/GridPari06.png" alt="">
                            <hr>
                            <hr>
                            <img src="/image/Playfair_Encryption/GridPari07.png" alt="">
                            <hr>
                            <hr>
                            <img src="/image/Playfair_Encryption/GridPari08.png" alt="">
                            <hr>
                            <hr>
                            <img src="/image/Playfair_Encryption/GridPari09.png" alt="">
                            <hr>
                            <hr>
                            <img src="/image/Playfair_Encryption/GridPari10.png" alt="">
                            <hr>
                        </div>
                        <br>
                        <!-- Decryption -->
                        <h2><><b>Decryption:</b></h2>
                        <ol>
                            <li><b>Key Reconstruction:</b></li>
                            <ul>
                                <li>Recreate the same 5x5 grid based on the keyword.</li>
                            </ul>
                            <li><b>Ciphertext Preparation:</b></li>
                            <ul>
                                <li>Break the ciphertext into pairs of letters (digraphs).</li>
                            </ul>
                            <li><b>Letter Transformation Rules:</b></li>
                            <ul>
                                <li>If the two letters in a pair are located in the same row of the secret key, the corresponding encrypted character for each letter is the previous letter to the left in the same row (with wrapping to the ending of the row if the plaintext letter is the first character in the row).</li>
                                <li>If the two letters in a pair are located in the same column of the secret key, the corresponding encrypted character for each letter is the letter above it in the same column (with wrapping to the ending of the column if the plaintext letter is the first character in the column).</li>
                                <li>If the two letters in a pair are not in the same row or column of the secret, the corresponding encrypted character for each letter is a letter that is in its own row but in the same column as the other letter.</li>
                            </ul>
                            <li><b>Plaintext Generation:</b></li>
                            <ul>
                                <li>The resulting pairs of letters are the plaintext.</li>
                            </ul>
                        </ol>
                        <br>
                        <h4><b><>Example of Playfair Cipher Decryption:</b></h4>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="content_box">
                        <div class="mx-5">
                            <h2><b><>Plafair Cipher Encryption:</b></h2>
                            <p>
                                Note: Before Encryption, please read Rules and process carefully.
                            </p>
                            <input type="text" id="key" name="key" class="form-control" placeholder="Enter key here ... Ex: ENCRYPTION">
                            <br>
                            <button onclick="generateGrid();" type="button" class="button">Click to Generate Grid</button>
                            <br><br>
                            <h2><b><>5x5 Grid:</b></h2>
                            <table id="main_grid" class="table table-bordered border-success">
                                <tr id="row1">
                                    <td id="col11">A</td>
                                    <td id="col12">B</td>
                                    <td id="col13">C</td>
                                    <td id="col14">D</td>
                                    <td id="col15">E</td>
                                  </tr>
                                  <tr id="row2">
                                    <td id="col21">F</td>
                                    <td id="col22">G</td>
                                    <td id="col23">H</td>
                                    <td id="col24">I/J</td>
                                    <td id="col25">K</td>
                                  </tr>
                                  <tr id="row3">
                                    <td id="col31">L</td>
                                    <td id="col32">M</td>
                                    <td id="col33">N</td>
                                    <td id="col34">O</td>
                                    <td id="col35">P</td>
                                  </tr>
                                  <tr id="row4">
                                    <td id="col41">Q</td>
                                    <td id="col42">R</td>
                                    <td id="col43">S</td>
                                    <td id="col44">T</td>
                                    <td id="col45">U</td>
                                  </tr>
                                  <tr id="row5">
                                    <td id="col51">V</td>
                                    <td id="col52">W</td>
                                    <td id="col53">X</td>
                                    <td id="col54">Y</td>
                                    <td id="col55">Z</td>
                                  </tr>
                            </table>
                            <br>
                            <input type="text" class="form-control" id="plain_text" name="plain_text" placeholder="Enter plain text...">
                            <br>
                            <button type="button" class="button" onclick="ptFixer();">Start Encryption</button>
                            <br><br>
                            <h2><b><>Plaintext Pair:</b></h2>
                            <p id="plain_text_display_area"></p>
                      
                            <div id="grids"></div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <div class="content_box">
                        <div class="mx-5">
                            <h2><b><>Plafair Cipher Decryption:</b></h2>
                            <p>
                                Note: Before Decryption, please read Rules and process carefully.
                            </p>
                            <input type="text" id="key" name="key" class="form-control" placeholder="Enter key here ... Ex: DECRYPTION">
                            <br>
                            <button onclick="generateGrid();" type="button" class="button">Click to Generate Grid</button>
                            <br><br>
                            <h2><b><>5x5 Grid:</b></h2>
                            <table id="main_grid" class="table table-bordered border-success">
                                <tr id="row1">
                                    <td id="col11">A</td>
                                    <td id="col12">B</td>
                                    <td id="col13">C</td>
                                    <td id="col14">D</td>
                                    <td id="col15">E</td>
                                  </tr>
                                  <tr id="row2">
                                    <td id="col21">F</td>
                                    <td id="col22">G</td>
                                    <td id="col23">H</td>
                                    <td id="col24">I/J</td>
                                    <td id="col25">K</td>
                                  </tr>
                                  <tr id="row3">
                                    <td id="col31">L</td>
                                    <td id="col32">M</td>
                                    <td id="col33">N</td>
                                    <td id="col34">O</td>
                                    <td id="col35">P</td>
                                  </tr>
                                  <tr id="row4">
                                    <td id="col41">Q</td>
                                    <td id="col42">R</td>
                                    <td id="col43">S</td>
                                    <td id="col44">T</td>
                                    <td id="col45">U</td>
                                  </tr>
                                  <tr id="row5">
                                    <td id="col51">V</td>
                                    <td id="col52">W</td>
                                    <td id="col53">X</td>
                                    <td id="col54">Y</td>
                                    <td id="col55">Z</td>
                                  </tr>
                            </table>
                            <br>
                            <input type="text" class="form-control" id="ciper_text" name="ciper_text" placeholder="Enter plain text...">
                            <br>
                            <button type="button" class="button" onclick="ptFixer();">Start Encryption</button>
                            <br><br>
                            <h2><b><>Cipertext Pair:</b></h2>
                            <p id="plain_text_display_area"></p>
                      
                            <div id="grids"></div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section id="vigenere" class="d-none">
            <ul class="nav nav-pills nav-light mb-3 justify-content-center gap-4" id="pills-tab" role="tablist">
                <li class="nav-item flex-grow-1" role="presentation">
                    <button class="button active w-100" id="pills-details-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-details" type="button" role="tab" aria-controls="pills-details"
                        aria-selected="true">Vigenere Cipher Details</button>
                </li>
                <li class="nav-item flex-grow-1" role="presentation">
                    <button class="button w-100" id="pills-encoding-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-encoding" type="button" role="tab" aria-controls="pills-encoding"
                        aria-selected="false">Encoding</button>
                </li>
                <li class="nav-item flex-grow-1" role="presentation">
                    <button class="button w-100" id="pills-decoding-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-decoding" type="button" role="tab" aria-controls="pills-decoding"
                        aria-selected="false">Decoding</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab">
                    <div class="content_box">
                        <!-- Vigenere Cipher Details Content -->
                        <h2><b><>Vigenere Cipher:</b></h2>
                        <p>Vigenère cipher, type of substitution cipher used for data encryption in which the original plaintext structure is somewhat concealed in the ciphertext by using several different
                            The cipher was invented in 1553 by the Italian cryptographer Giovan Battista Bellaso but for centuries was attributed to the 16th-century French cryptographer Blaise de Vigenère, who devised a similar cipher in 1586.
                            A polyalphabetic cipher is any cipher based on substitution, using multiple substitution alphabets. The encryption of the original text is done using the Vigenère square or Vigenère table.
                        </p><br>
                        <h3><><b>Encryption:</b></h3>
                        <ol>
                            <li><b>Key Selection:</b></li>
                            <ul>
                                <li>Choose a keyword or key phrase. This key should be repeated or extended to match the length of the plaintext message.</li>
                            </ul>
                            <li><b>Conversion to Numeric Values:</b></li>
                            <ul>
                                <li>Convert both the plaintext message and the keyword into numeric values. This is commonly done using a simple scheme, such as A=0, B=1, ..., Z=25.</li>
                            </ul>
                            <li><b>Encryption Formula:</b></li>
                            <ul>
                                <li>E<sub>i</sub>=(P<sub>i</sub>+K<sub>i</sub>) mod 26 </li>
                            </ul>
                          <li><b>Process:</b></li>
                          <ul>
                            <li>Find The corresponding letter in the keyword.</li>
                            <li>Use the Vigenere table to find the encrypted letter.</li>
                            <li>The encrypted letter is determined by the intersection of the row corresponding to the plaintext letter and the column corresponding to the keyword letter.</li>
                            <li>Repeat this process for each letter in the plaintext, cycling through the keyword as needed.</li>
                          </ul>
                        <br>
                        <h4><b><>Example of Vigenere Cipher Ecryption:</b></h4>
                        <br>
                        <div class="Encryption_Example">
                            <h4><1>Take Input Plaintext and Keyword.</h4>
                                <hr>
                            <img src="./image/Vigenere_Encryption/Input.png" alt="">
                                <hr>
                            <h4><2>Plain Text in Table Form.</h4>
                                <hr>
                            <img src="./image/Vigenere_Encryption/PlainText.png" alt="">
                                <hr>
                            <h4><3>Plain Values in Table Form.</h4>
                                <hr>
                            <img src="./image/Vigenere_Encryption/PlainValue.png" alt="">
                                <hr>
                            <h4><4>Keyword in Table Form.</h4>
                                <hr>
                            <img src="./image/Vigenere_Encryption/keyword.png" alt="">
                                <hr>
                            <h4><5>Keyword Values in Table Form.</h4>
                                <hr>
                            <img src="./image/Vigenere_Encryption/keyword value.png" alt="">
                                <hr>
                            <h4><6>Ciphertext in Table Form.</h4>
                                <hr>
                            <img src="./image/Vigenere_Encryption/ciphertext.png" alt="">
                                <hr>
                            <h4><7>Cipherext in Table Form.</h4>
                                <hr>
                            <img src="./image/Vigenere_Encryption/cipher values.png" alt="">
                                <hr>

                        </div>
                        <!-- Decryption -->
                        <h2><><b>Decryption:</b></h2>
                        <ol>
                            <li><b>Key Repetition:</b></li>
                            <ul>
                                <li>Repeat the decryption key to match the length of the ciphertext message.</li>
                            </ul>
                            <li><b>Ciphertext Conversion :</b></li>
                            <ul>
                                <li>Convert both the ciphertext message and the repeated decryption key into numeric values. Again, this is often done using a simple scheme, such as A=0, B=1, ..., Z=25.</li>
                            </ul>
                            <li><b>Decryption Formula:</b></li>
                            <ul>
                                <li>D<sub>i</sub>=(C<sub>i</sub>-K<sub>i</sub>) mod 26 </li>
                            </ul>
                            <li><b>Decryption Process:</b></li>
                            <ul>
                                <li>Determine the numeric value of the corresponding letter in the decryption key.</li>
                                <li>Shift the cipertext letter backward by the corresponding value in the key(mod26),wrapping around if necessary.</li>
                                <li>Convert the resulting numeric value back to a letter.</li>
                            </ul>
                        </ol>
                        <br>
                        <h4><b><>Example of Vigenere Cipher Decryption:</b></h4>
                        <br>
                        <div class="Encryption_Example">
                            <h4><1>Take Input Ciphertext and Keyword.</h4>
                                <hr>
                            <img src="./image/Vigenere_Decryption/Input.png" alt="">
                                <hr>
                            <h4><2>Ciphertext in Table Form.</h4>
                                <hr>
                            <img src="./image/Vigenere_Decryption/Ciphertext.png" alt="">
                                <hr>
                            <h4><3>Cipher Values in Table Form.</h4>
                                <hr>
                            <img src="./image/Vigenere_Decryption/CipherValues.png" alt="">
                                <hr>
                            <h4><4>Keyword in Table Form.</h4>
                                <hr>
                            <img src="./image/Vigenere_Decryption/Keyword.png" alt="">
                                <hr>
                            <h4><5>Keyword Values in Table Form.</h4>
                                <hr>
                            <img src="./image/Vigenere_Decryption/keywordValue.png" alt="">
                                <hr>
                            <h4><6>Plaintext in Table Form.</h4>
                                <hr>
                            <img src="./image/Vigenere_Decryption/Plaintext.png" alt="">
                                <hr>
                            <h4><7>Plain Values in Table Form.</h4>
                                <hr>
                            <img src="./image/Vigenere_Decryption/PlainValuse.png" alt="">
                                <hr>

                        </div>
                        <!-- Place your detailed explanation of the Vigenere cipher here -->
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-encoding" role="tabpanel" aria-labelledby="pills-encoding-tab">
                    <div class="content_box">
                        <!-- Vigenere Cipher Encoding Content -->
                        <h2><b>Vigenere Cipher Encryption:</b></h2>
                        <p>Note: Before Encryption, please read Rules and process carefully.</p>
                        <input type="text" id="plaintext_input" class="form-control" placeholder="Enter plaintext here ... Ex: HELLO">
                        <input type="text" id="encryption_key" class="form-control" placeholder="Enter key here ... Ex: KEY">
                        <br>
                        <button onclick="vigenereEncryptAndDisplay();" type="button" class="button">Start Encryption</button>
                        <button onclick="resetOutput();" type="button" class="button">Reset</button>
                        <br><br>
                        <!-- Container to display the dynamic table with encryption results -->
                      
                        <table id="main_grid" class="table table-bordered border-success">
                            <tr id="row1" class="GlassEffect" >
                                <td id="col11">0</td>
                                <td id="col12">1</td>
                                <td id="col13">2</td>
                                <td id="col14">3</td>
                                <td id="col15">4</td>
                                <td id="col16">5</td>
                                <td id="col21">6</td>
                                <td id="col22">7</td>
                                <td id="col23">8</td>
                                <td id="col24">9</td>
                                <td id="col25">10</td>
                                <td id="col26">11</td>
                                <td id="col31">12</td>
                              </tr>
                            <tr id="row2" class="LetterEffect">
                                <td id="col11">A</td>
                                <td id="col12">B</td>
                                <td id="col13">C</td>
                                <td id="col14">D</td>
                                <td id="col15">E</td>
                                <td id="col16">F</td>
                                <td id="col21">G</td>
                                <td id="col22">H</td>
                                <td id="col23">I</td>
                                <td id="col24">J</td>
                                <td id="col25">K</td>
                                <td id="col26">L</td>
                                <td id="col31">M</td>
                              </tr>
                              <tr id="row3" class="GlassEffect">
                                <td id="col11">13</td>
                                <td id="col12">14</td>
                                <td id="col13">15</td>
                                <td id="col14">16</td>
                                <td id="col15">17</td>
                                <td id="col16">18</td>
                                <td id="col21">19</td>
                                <td id="col22">20</td>
                                <td id="col23">21</td>
                                <td id="col24">22</td>
                                <td id="col25">23</td>
                                <td id="col26">24</td>
                                <td id="col31">25</td>
                              </tr>
                              <tr id="row4" class="LetterEffect">
                                <td id="col32">N</td>
                                <td id="col33">O</td>
                                <td id="col34">P</td>
                                <td id="col35">Q</td>
                                <td id="col36">R</td>
                                <td id="col41">S</td>
                                <td id="col42">T</td>
                                <td id="col43">U</td>
                                <td id="col44">V</td>
                                <td id="col45">W</td>
                                <td id="col46">X</td>
                                <td id="col54">Y</td>
                                <td id="col55">Z</td>
                              </tr>
                        </table>
                        <h2><b>Encrypted Text:</b></h2>
                        <div id="tableContainer"></div>
                        <p id="encrypted_text_display_area"></p>

                        <button class="button" onclick="copyToClipboard(true)">Copy Encrypted Text</button>
   

                    </div>
                </div>
                <div class="tab-pane fade" id="pills-decoding" role="tabpanel" aria-labelledby="pills-decoding-tab">
                    <div class="content_box">
                        
                        <!-- Vigenere Cipher Decoding Content -->
                        <h2><b>Vigenere Cipher Decryption:</b></h2>
                        <p>Note: Before decryption, please read rules and process carefully.</p>
                        <input type="text" id="cipher_text_input" class="form-control" placeholder="Enter ciphertext here ... Ex: RCLLE">
                        <input type="text" id="decryption_key" class="form-control" placeholder="Enter key here ... Ex: KEY">
                        <br>
                        <button onclick="vigenereDecryptAndDisplay();" type="button" class="button">Start Decryption</button>
                        <button onclick="resetOutput();" type="button" class="button">Reset</button>
                        <br>
                        <br>
                        <table id="main_grid" class="table table-bordered border-success">
                            <tr id="row1" class="GlassEffect" >
                                <td id="col11">0</td>
                                <td id="col12">1</td>
                                <td id="col13">2</td>
                                <td id="col14">3</td>
                                <td id="col15">4</td>
                                <td id="col16">5</td>
                                <td id="col21">6</td>
                                <td id="col22">7</td>
                                <td id="col23">8</td>
                                <td id="col24">9</td>
                                <td id="col25">10</td>
                                <td id="col26">11</td>
                                <td id="col31">12</td>
                              </tr>
                            <tr id="row2" class="LetterEffect">
                                <td id="col11">A</td>
                                <td id="col12">B</td>
                                <td id="col13">C</td>
                                <td id="col14">D</td>
                                <td id="col15">E</td>
                                <td id="col16">F</td>
                                <td id="col21">G</td>
                                <td id="col22">H</td>
                                <td id="col23">I</td>
                                <td id="col24">J</td>
                                <td id="col25">K</td>
                                <td id="col26">L</td>
                                <td id="col31">M</td>
                              </tr>
                              <tr id="row3" class="GlassEffect">
                                <td id="col11">13</td>
                                <td id="col12">14</td>
                                <td id="col13">15</td>
                                <td id="col14">16</td>
                                <td id="col15">17</td>
                                <td id="col16">18</td>
                                <td id="col21">19</td>
                                <td id="col22">20</td>
                                <td id="col23">21</td>
                                <td id="col24">22</td>
                                <td id="col25">23</td>
                                <td id="col26">24</td>
                                <td id="col31">25</td>
                              </tr>
                              <tr id="row4" class="LetterEffect">
                                <td id="col32">N</td>
                                <td id="col33">O</td>
                                <td id="col34">P</td>
                                <td id="col35">Q</td>
                                <td id="col36">R</td>
                                <td id="col41">S</td>
                                <td id="col42">T</td>
                                <td id="col43">U</td>
                                <td id="col44">V</td>
                                <td id="col45">W</td>
                                <td id="col46">X</td>
                                <td id="col54">Y</td>
                                <td id="col55">Z</td>
                              </tr>
                        </table>
                     
                            <br><br>
                            <h2><b>Decrypted Text:</b></h2>
                            <div id="decryptionTableContainer"></div>
                            <p id="decrypted_text_display_area"></p>
                            <button class="button" onclick="copyToClipboard(false)">Copy Decrypted Text</button>
                                


                        
                        <!-- Place your Vigenere cipher decoding process explanation here -->
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        &copy; 2024 | Developed by Md. Hasibur Rahman and Md. Sajjad Khan
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    <script src="./js/playfair.js"></script>
    <Script src="./js/app.js"></Script>
    <script src="./js/vigenere.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>


</body>

</html>