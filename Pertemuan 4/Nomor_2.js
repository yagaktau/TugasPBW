// Kalkulator menggunakan arrow function dan spread operator
const calculator = (operation, ...numbers) => {
    switch (operation) {
      case '+':
        return numbers.reduce((a, b) => a + b, 0);
      case '-':
        return numbers.reduce((a, b) => a - b);
      case '*':
        return numbers.reduce((a, b) => a * b, 1);
      case '/':
        return numbers.reduce((a, b) => a / b);
      case '%':
        return numbers.reduce((a, b) => a % b);
      default:
        return 'Operasi tidak valid';
    }
  };
  
  // Contoh penggunaan
  console.log(calculator('+', 10, 20, 30)); // Output: 60
  console.log(calculator('-', 100, 50, 10)); // Output: 40
  console.log(calculator('*', 2, 3, 4)); // Output: 24
  console.log(calculator('/', 100, 2, 5)); // Output: 10
  console.log(calculator('%', 100, 30)); // Output: 10
  