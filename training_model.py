import pandas as pd
from sklearn.cluster import KMeans
from sklearn.preprocessing import LabelEncoder
from sklearn.feature_extraction.text import TfidfVectorizer
import joblib

# Data dummy
data = {
    'tanggal_kejadian': ['2024-01-01', '2024-01-02', '2024-01-03', '2024-01-04'],
    'alamat_kejadian': ['Jakarta', 'Bandung', 'Jakarta', 'Surabaya'],
    'pesan': ['Ada preman di indomaret', 'pungli di indomaret', 'di perempatan pesanggrahan ada yang malak', 'di depan toko bangunan jaya abadi ada pungli']
}

df = pd.DataFrame(data)

# Encode alamat kejadian
encoder = LabelEncoder()
df['alamat_kejadian'] = encoder.fit_transform(df['alamat_kejadian'])

# Convert tanggal_kejadian to numerical data (timestamp in seconds)
df['tanggal_kejadian'] = pd.to_datetime(df['tanggal_kejadian']).astype('int64') // 10**9

# Convert pesan to numerical data using TF-IDF
vectorizer = TfidfVectorizer()
pesan_tfidf = vectorizer.fit_transform(df['pesan']).toarray()

# Combine all features
features = pd.concat([df[['tanggal_kejadian', 'alamat_kejadian']], pd.DataFrame(pesan_tfidf)], axis=1)

# Convert column names to strings
features.columns = features.columns.astype(str)

# Latih model KMeans
kmeans = KMeans(n_clusters=2, random_state=42)
kmeans.fit(features)

# Simpan model, encoder, dan vectorizer ke file
joblib_file = 'storage/app/public/kmeans_model.pkl'
joblib.dump(kmeans, joblib_file)
joblib.dump(encoder, 'storage/app/public/encoder.pkl')
joblib.dump(vectorizer, 'storage/app/public/vectorizer.pkl')

print(f"Model KMeans, encoder, dan vectorizer telah disimpan ke {joblib_file}")
