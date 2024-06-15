const alphabets = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];

var pairs = [];

function checkAndModify(input) {
  input = input.toLowerCase();
  const pattern = /^[a-z][a-z\s]*$/;
  if (pattern.test(input)) {
    input = input.replace(/\s/g, '');
    input = input.toUpperCase();
    return input;
  }
  else {
    alert("No digits/special symbols allowed");
  }
}

function generateGrid() {
  const key = checkAndModify(document.getElementById("key").value.toLowerCase());
  const key_length = key.length;
  const remaining_alphabets_count = 25 - key_length;
  // console.log(key, key_length);
  
  var row_index = 1;
  var column_index = 1;
  
  // Function to remove duplicate characters from a string
  function removeDuplicates(str) {
    return str
      .split('')
      .filter(function(item, pos, self) {
        return self.indexOf(item) == pos;
      })
      .join('');
  }
  
  // Remove duplicates from the key
  const uniqueKey = removeDuplicates(key);
  
  for (let index = 0; index < uniqueKey.length; index++) {
    const element = uniqueKey[index];
    if (row_index < 6 && column_index < 6) {
      // console.log(row_index, column_index);
      document.getElementById(`col${row_index}${column_index}`).innerText = element;
      document.getElementById(`col${row_index}${column_index}`).style.backgroundColor = "##34495e";
      column_index++;
      if (column_index === 6) {
        row_index++;
        column_index = 1;
      }
    }
  }
  

  // console.log("2nd part");

  for (let index = 0; index < key.length; index++) {
    const element = key[index];
    const i = alphabets.indexOf(element);
    if (i > -1) {
      alphabets.splice(i, 1);
    }
  }

  for (let index = 0; index < remaining_alphabets_count; index++) {
    if (row_index < 6 && column_index < 6) {
      document.getElementById(`col${row_index}${column_index}`).innerText = alphabets[index];
      document.getElementById(`col${row_index}${column_index}`).style.backgroundColor = "#34495e";

      column_index++;//#2c3e50
      if (column_index === 6) {
        row_index++;
        column_index = 1;
      }
    }
  }
}

// PT fixer

function ptFixer() {
  document.getElementById("grids").innerHTML = "";
  var plain_txt = checkAndModify(document.getElementById('plain_text').value);
  plain_txt = plain_txt.replace(/\s/g,'');
  plain_txt = plain_txt.toUpperCase();

  var plain_txt_array = plain_txt.split("");

  var fixed_plain_text_pairs = [];

  var counter = 0;
  var first_index = 0;
  var second_index = 1;

  var max = plain_txt_array.length;
  // console.log("Initial ",plain_txt_array, plain_txt_array.length);

  while (counter < max) {
    const first_element = plain_txt_array[first_index];
    const second_element = plain_txt_array[second_index];

    if (first_element === second_element) {
      plain_txt_array.splice(second_index, 0, "Z");
      plain_txt_array.join();
      // console.log(plain_txt_array, plain_txt_array.length);
      max++;
    }

    if (plain_txt_array.length % 2 != 0) {
      plain_txt_array.push("Z");
    }
    fixed_plain_text_pairs.push({ first: plain_txt_array[first_index], second: plain_txt_array[second_index] });

    counter += 2;
    first_index += 2;
    second_index += 2;
  }

  var fixed_pair_html_list = "<div style='display: flex; flex-wrap: wrap;'>"; // Use a flexbox container
  fixed_plain_text_pairs.forEach(e => {
      pairs.push(e);
      fixed_pair_html_list += `<div style='margin: 5px; border: 2px solid green; padding: 5px;'>${e.first} ${e.second}</div>`; // Wrap each pair in a div with green border
      makeNewGrid(e);
  })
  fixed_pair_html_list += "</div>"; // Close the flexbox container
  // setting global var pairs
  document.getElementById("plain_text_display_area").innerHTML = fixed_pair_html_list;
  
  highlightTargets();
}
// for grid generation
function makeNewGrid(pair) {
  let location = [];
  const cipher_grid = document.getElementById("main_grid").innerHTML;
  const table_hading = `<br/><hr/><br/><h2 style="text-align: center;"><b><>Grid For Pair: "${pair.first}${pair.second}"</b></h2>`;
 
  var my_temp_table = document.createElement("table");
  my_temp_table.id = `grid_for_${pair.first}${pair.second}`;

  // Add class attribute to the table
  my_temp_table.classList.add("table", "table-bordered", "border-success");

  my_temp_table.innerHTML = cipher_grid;
  my_temp_table.childNodes.forEach(tbody => {
    Array.from(tbody.childNodes).filter(e=>e.nodeName==="TR").forEach((tr,x) => {
      tr.id = "";
      Array.from(tr.childNodes).filter(e=>e.nodeName==="TD").forEach((td,y) => {
        td.id=`${pair.first}${pair.second}_${x+1}_${y+1}`
        if(td.innerText == pair.first){
          location[0]=[x+1,y+1];
        }
        if(td.innerText == pair.second){
          location[1]=[x+1,y+1];
        }
        if (td.innerText == pair.first || td.innerText == pair.second) {
          td.style.backgroundColor = "red";
          td.style.color = "white";
          // console.log(td.innerText);
        }
      })
    })
  });
  var heading = document.createElement("div");
  heading.innerHTML = table_hading;
  document.getElementById("grids").appendChild(heading);
  document.getElementById("grids").appendChild(my_temp_table);

  let new_location = [
    [location[0][0],location[1][1]],
    [location[1][0],location[0][1]],
  ];
  const c_pair_first= document.getElementById(`${pair.first}${pair.second}_${new_location[0][0]}_${new_location[0][1]}`).innerText;
  const c_pair_second= document.getElementById(`${pair.first}${pair.second}_${new_location[1][0]}_${new_location[1][1]}`).innerText;

  const table_fotter = `<p  style="text-align: center;"><b style="color: #f1c40f;"><>Cipher For this Pair: "${c_pair_first}${c_pair_second}"</b></p>`;

  var footer = document.createElement("div");
  footer.innerHTML = table_fotter;

  document.getElementById("grids").appendChild(footer);

}

// for highlighting the target char
function highlightTargets() {
  console.log(pairs);
}
