// firebase.js
import { initializeApp } from 'firebase/app';
import { getStorage } from 'firebase/storage';

const firebaseConfig = {
    apiKey: "AIzaSyA-QUFdmkri7tul4SYrErEivDaxBksa1Qc",
    authDomain: "workup-464af.firebaseapp.com",
    projectId: "workup-464af",
    storageBucket: "workup-464af.appspot.com",
    messagingSenderId: "623240730819",
    appId: "1:623240730819:web:28ca0c6e405ccd2d436a76",
    measurementId: "G-X1Y39ZHK8J"
};

const app = initializeApp(firebaseConfig);
const storage = getStorage(app);

export { storage };
