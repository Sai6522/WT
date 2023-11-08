const { MongoClient } = require('mongodb');

const uri = 'mongodb://localhost:27017';
const client = new MongoClient(uri);

async function connectToMongoDB() {
  try {
    await client.connect();
    console.log('Connected to MongoDB');
  } catch (error) {
    console.error('Error connecting to MongoDB:', error);
  }
}

connectToMongoDB();


async function createDocument() {
  const db = client.db('mydatabase'); 
  const collection = db.collection('mycollection'); 

  const newDocument = { name: 'John Doe', age: 30 };

  const result = await collection.insertOne(newDocument);
  console.log('Inserted document with ID:', result.insertedId);
}

createDocument();


async function readDocuments() {
  const db = client.db('mydatabase'); 
  const collection = db.collection('mycollection'); 

  const query = { age: 30 }; 

  const documents = await collection.find(query).toArray();
  console.log('Retrieved documents:', documents);
}

readDocuments();


async function updateDocument() {
  const db = client.db('mydatabase'); 
  const collection = db.collection('mycollection'); 

  const filter = { name: 'John Doe' }; 
  const update = { $set: { age: 35 } }; 

  const result = await collection.updateOne(filter, update);
  console.log('Matched', result.matchedCount, 'documents and modified', result.modifiedCount, 'documents');
}

updateDocument();


async function deleteDocument() {
  const db = client.db('mydatabase'); 
  const collection = db.collection('mycollection'); 

  const filter = { name: 'John Doe' }; 

  const result = await collection.deleteOne(filter);
  console.log('Deleted', result.deletedCount, 'document');
}

deleteDocument();

async function closeConnection() {
  await client.close();
  console.log('Disconnected from MongoDB');
}

closeConnection();




