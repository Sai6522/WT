<?php
require 'vendor/autoload.php'; // Include the MongoDB PHP library
// Create a MongoDB client
$client = new MongoDB\Client("mongodb://localhost:27017");
// Select a database and collection
$database = $client->selectDatabase('mydb');
$collection = $database->selectCollection('users');
// Create (Insert) a new document
$newUser = [
'username' => 'john_doe',
'email' => 'john@example.com',
'age' => 30, ];
$result = $collection->insertOne($newUser);
if ($result->getInsertedCount() > 0) {
echo "User added successfully. Inserted ID: " . $result->getInsertedId() . "<br>";
}
// Read (Find) a document
$findUser = $collection->findOne(['username' => 'john_doe']);
if ($findUser) {
echo "Found User:<br>";
print_r($findUser);
echo "<br>";
} else {
echo "User not found.<br>";
}
// Update a document
$updateResult = $collection->updateOne(
['username' => 'john_doe'], ['$set' => ['age' => 31]]
);
if ($updateResult->getModifiedCount() > 0) {
echo "User updated successfully.<br>";
} else {
echo "User not found or no changes were made.<br>";
}
// Delete a document
$deleteResult = $collection->deleteOne(['username' => 'john_doe']);
if ($deleteResult->getDeletedCount() > 0) {
echo "User deleted successfully.<br>";
} else {
echo "User not found or already deleted.<br>";
}
?>