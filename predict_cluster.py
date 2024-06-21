import sys
import pandas as pd
import joblib

def predict_cluster(tanggal_kejadian, alamat_kejadian, pesan):
    # Konversi tanggal kejadian ke datetime jika perlu
    tanggal_kejadian_dt = pd.to_datetime(tanggal_kejadian)

    # Lakukan pengolahan lainnya sesuai kebutuhan, seperti label encoding alamat kejadian, dll.
    # Contoh sederhana:
    alamat_kejadian_encoded = 1  # Contoh, sesuaikan dengan proses encoding yang sesuai
    pesan_encoded = "pesan_encoded"  # Contoh, sesuaikan dengan proses encoding yang sesuai

    # Buat DataFrame untuk prediksi
    data = {
        'tanggal_kejadian': [tanggal_kejadian_dt],
        'alamat_kejadian': [alamat_kejadian_encoded],
        'pesan': [pesan_encoded]
    }

    df = pd.DataFrame(data)

    # Ubah nama kolom DataFrame sesuai dengan nama fitur yang digunakan saat pelatihan
    df.columns = ['0', '1', '2']  # Sesuaikan dengan nama fitur yang digunakan saat pelatihan

    # Load model KMeans
    model_path = 'storage/app/public/kmeans_model.pkl'
    kmeans = joblib.load(model_path)

    # Prediksi cluster
    cluster = kmeans.predict(df)

    return cluster[0]

if __name__ == "__main__":
    # Pastikan argumen yang diberikan sesuai dengan urutan yang diharapkan
    if len(sys.argv) < 4:
        print("Usage: python predict_cluster.py <tanggal_kejadian> <alamat_kejadian> <pesan>")
        sys.exit(1)

    tanggal_kejadian = sys.argv[1]
    alamat_kejadian = sys.argv[2]
    pesan = sys.argv[3]

    predicted_cluster = predict_cluster(tanggal_kejadian, alamat_kejadian, pesan)
    print(f"Predicted cluster: {predicted_cluster}")
