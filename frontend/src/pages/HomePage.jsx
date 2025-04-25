import React from 'react';
import Header from '../components/Header/Header';
import Hero from '../components/Hero/Hero';
import ValuesSection from '../components/ValuesSection/ValuesSection';
import Grid from '../components/Grid/Grid';
import arganOil from '../assets/images/argan-oil.jpg';
import soap from '../assets/images/soap.jpg';

const HomePage = () => {
  const products = [
    { 
      id: 1, 
      name: 'Huile d\'Argan', 
      price: 24.90, 
      image: arganOil,
      shortDescription: 'Hydratation intense visage et corps' 
    },
    { 
      id: 2, 
      name: 'Savon à l\'argile', 
      price: 8.90, 
      image: soap,
      shortDescription: 'Purifiant pour peaux sensibles' 
    }
  ];

  const handleAddToCart = (product) => {
    console.log('Produit ajouté:', product);
    // À connecter avec CartContext plus tard
  };

  return (
    <div className="app">
      <Header />
      <main>
        <Hero />
        <ValuesSection />
        <section className="products-section">
          <div className="container">
            <h2>Nos produits phares</h2>
            <Grid products={products} onAddToCart={handleAddToCart} />
          </div>
        </section>
      </main>
    </div>
  );
};

export default HomePage;