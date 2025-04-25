import React from 'react';
import './ValuesSection.css';

const values = [
  { icon: '🌱', title: '100% Naturel', desc: 'Ingrédients d\'origine naturelle' },
  { icon: '♻️', title: 'Éco-responsable', desc: 'Emballages recyclables' },
  { icon: '✋', title: 'Fabriqué à la main', desc: 'Savoir-faire artisanal' }
];

const ValuesSection = () => {
  return (
    <section className="values-section">
      <div className="container">
        <h2>Nos engagements</h2>
        <div className="values-grid">
          {values.map((value, index) => (
            <div key={index} className="value-card">
              <div className="value-icon">{value.icon}</div>
              <h3>{value.title}</h3>
              <p>{value.desc}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default ValuesSection;