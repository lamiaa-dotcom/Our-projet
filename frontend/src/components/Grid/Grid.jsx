import React from 'react';
import './Grid.css';
import Card from '../Card/Card';

const Grid = ({ products, onAddToCart }) => {
  return (
    <div className="grid-container">
      {products.map((product) => (
        <Card 
          key={product.id} 
          product={product}
          onAddToCart={onAddToCart}
        />
      ))}
    </div>
  );
};

export default Grid;