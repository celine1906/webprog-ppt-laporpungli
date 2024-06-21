import sys
import pandas as pd
import joblib
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.preprocessing import LabelEncoder

def predict_cluster(tanggal_kejadian, alamat_kejadian, pesan, encoder_path, vectorizer_path, kmeans_path):
    # Konversi tanggal kejadian ke timestamp
    tanggal_kejadian_ts = pd.to_datetime(tanggal_kejadian).timestamp()

    # Load encoder, vectorizer, and kmeans model
    encoder = joblib.load(encoder_path)
    vectorizer = joblib.load(vectorizer_path)
    kmeans = joblib.load(kmeans_path)

    # Encode alamat kejadian dengan nilai default jika label tidak dikenali
    try:
        alamat_kejadian_encoded = encoder.transform([alamat_kejadian])[0]
    except ValueError:
        # Assign a default value for unseen labels
        alamat_kejadian_encoded = -1  # Example default value; adjust as needed

    # Transform pesan to numerical data using TF-IDF
    pesan_tfidf = vectorizer.transform([pesan]).toarray()

    # Combine all features into a single DataFrame
    data = {
        'tanggal_kejadian': [tanggal_kejadian_ts],
        'alamat_kejadian': [alamat_kejadian_encoded]
    }

    df = pd.DataFrame(data)
    features = pd.concat([df, pd.DataFrame(pesan_tfidf)], axis=1)

    # Ensure all column names are strings
    features.columns = features.columns.astype(str)

    # Predict the cluster
    cluster = kmeans.predict(features)

    return cluster[0]

if __name__ == "__main__":
    # Pastikan argumen yang diberikan sesuai dengan urutan yang diharapkan
    if len(sys.argv) < 6:
        print("Usage: python predict_cluster.py <tanggal_kejadian> <alamat_kejadian> <pesan> <encoder_path> <vectorizer_path> <kmeans_path>")
        sys.exit(1)

    tanggal_kejadian = sys.argv[1]
    alamat_kejadian = sys.argv[2]
    pesan = sys.argv[3]
    encoder_path = sys.argv[4]
    vectorizer_path = sys.argv[5]
    kmeans_path = sys.argv[6]

    predicted_cluster = predict_cluster(tanggal_kejadian, alamat_kejadian, pesan, encoder_path, vectorizer_path, kmeans_path)
    print(predicted_cluster)
