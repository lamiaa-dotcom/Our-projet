import React from 'react';
import './Card.css';

const Card = ({ product, onAddToCart }) => {
  return (
    <div className="card">
      <div className="card-badge">🌿 Bio</div>
      <img 
        src={product.image} 
        alt={product.name} 
        className="card-image"
        loading="lazy"
      />
      <div className="card-content">
        <h3 className="card-title">{product.name}</h3>
        <p className="card-description">{product.shortDescription || 'Produit naturel de qualité'}</p>
        <div className="card-footer">
          <span className="card-price">{product.price.toFixed(2)} €</span>
          <button 
            onClick={() => onAddToCart(product)}
            className="card-button"
            aria-label={`Ajouter ${product.name} au panier`}
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
              <line x1="3" y1="6" x2="21" y2="6"></line>
              <path d="M16 10a4 4 0 0 1-8 0"></path>
            </svg>
            Ajouter
          </button>
        </div>
      </div>
    </div>
  );
};

export default Card;