const fs = require('fs');
const data = fs.readFileSync("data.txt", "utf8");
console.log(data);


const fs = require('fs');
var data = fs.readFileSync("data.txt").toString();
console.log(data);

const fs=require('fs');
 fs.readFile("data.txt",(err,data)=>{
 if(err){
 console.log("Error : ", err);
 }
 else{
 console.log(data.toString());
 }
})

const fs = require('fs');
fs.readFile("data.txt", { encoding: 'utf8' }, (err, data) => {
  if (err) {
    console.log("Error:", err);
  } else {
    console.log(data);
  }
});

const fs=require('fs');
fs.stat('src/data.txt', (err, stats) => {
 if (err) {
 console.error(err)
 }
 else{
 console.log(stats.isFile()); // true
 console.log(stats.isDirectory()); // false
 console.log(stats.size); // 1024
 }
 });

const fs=require('fs');
 fs.writeFileSync('data.txt','Hello Node');

const fs=require("fs");
 fs.writeFileSync('data.txt','Hello Node JS');

 const fs=require("fs");
 fs.writeFile('data.txt',"hello Node",(err)=>{
 if(err){
 console.log(err)
 }
 })


 const fs = require("fs");
fs.writeFile('data.txt', 'hello Node', 'utf8', (err) => {
  if (err) {
    console.log(err);
  }
});

const fs = require('fs');

fs.appendFile('src/data.txt', 'hello Node 1', 'utf8', (err) => {
  if (err) {
    console.log(err);
  } else {
    console.log('Data appended to file.');
  }
});

fs.appendFile('src/data.txt', 'hello Node 2', 'utf8', (err) => {
  if (err) {
    console.log(err);
  } else {
    console.log('Data appended to file.');
  }
});


const fs=require('fs');
fs.appendFile('src/data.txt',"hello Node 1",'utf8',(err)=>{
 if(err){
 console.log(err)
 }
});
fs.appendFile('src/data.txt',"hello Node 2",'utf8',(err)=>{
 if(err){
 console.log(err)
 }
});


 const fs=require('fs');
 fs.unlinkSync('data.txt');


const fs=require('fs');
 try{
 fs.unlinkSync('data.txt');
 console.log('file deleted successfully');
 }
 catch(err){
 console.log("Error",err);
 }

const fs=require('fs');
 fs.unlink('data.txt',(err)=>{
 if(err){
 console.log('Error:', err);
 }
 else{
 console.log('file deleted successfully'); 
 }
 })










