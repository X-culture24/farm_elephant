-- DNR Elephant Farm Dairy - Seed Data
USE farm_elephant;

-- Default categories
INSERT INTO categories (name, description) VALUES
('Fresh Milk', 'Raw and pasteurised fresh milk products from our herd'),
('Dairy Products', 'Processed dairy including yoghurt, cheese, and butter'),
('Breeding Cattle', 'Premium Friesian, Fleckvieh Jersey, and Brahman breeding stock'),
('Auction Cattle', 'Live cattle available for auction bidding'),
('Fodder & Feed', 'Quality animal feed and fodder products');

-- Default admin user (password: Admin@1999!)
-- Hash generated with: password_hash('Admin@1999!', PASSWORD_BCRYPT)
INSERT INTO users (name, email, password_hash, phone, role) VALUES
('Farm Admin', 'admin@elephantfarm.co.ke', '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+254724345658', 'admin');
