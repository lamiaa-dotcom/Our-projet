import React from 'react';
import './Header.css';
import logo from '../../assets/images/logo.png';

const Header = () => {
  return (
    <header className="header">
      <div className="logo">
        <img src={logo} alt="Lotus Bio" height="40" />
      </div>
      <nav className="nav">
        <ul>
          <li><a href="/">Accueil</a></li>
          <li><a href="/products">Nos produits</a></li>
          <li><a href="/about">Notre histoire</a></li>
        </ul>
      </nav>
      <div className="cart-icon">🛒 <span className="cart-count">0</span></div>
    </header>
  );
};

export default Header;