import pandas as pd
from sklearn.cluster import KMeans
import joblib

def perform_clustering(data, n_clusters=3):
    kmeans = KMeans(n_clusters=n_clusters, random_state=0)
    kmeans.fit(data)
    return kmeans

def save_model(model, filename='kmeans_model.pkl'):
    joblib.dump(model, filename)

if __name__ == '__main__':
    # Load data from CSV file (sesuaikan dengan path dan nama file data Anda)
    data = pd.read_csv('storage/app/public/aduans.csv')

    # Pilih fitur yang relevan untuk clustering
    features = data[['tanggal_kejadian', 'alamat_kejadian', 'pesan']]  # sesuaikan dengan fitur yang relevan

    # Lakukan clustering
    model = perform_clustering(features, n_clusters=3)

    # Simpan model clustering
    save_model(model)
