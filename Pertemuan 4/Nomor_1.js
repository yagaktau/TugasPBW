// Fungsi untuk mencetak deret Fibonacci
const generateFibonacci = (n) => {
    if (n <= 0) return [];
    if (n === 1) return [0];
    if (n === 2) return [0, 1];
  
    const result = [0, 1];
    for (let i = 2; i < n; i++) {
      result.push(result[i - 1] + result[i - 2]);
    }
    return result;
  };
  
  // Contoh penggunaan
  const n = 10; // Ganti dengan jumlah angka Fibonacci yang diinginkan
  console.log(`Deret Fibonacci (${n} angka):`, generateFibonacci(n));
  