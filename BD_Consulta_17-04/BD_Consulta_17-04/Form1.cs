// importa o MySQL
using MySql.Data.MySqlClient;

namespace BD_Consulta_17_04
{
    public partial class Form1 : Form
    {
        // referencia o MySQL e cria uma variável pública e estática (para aparecer em outros arquivos)
        static public MySqlConnection oConexao = new MySqlConnection();
        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            // atribui o servidor (localhost), o usuário, senha e banco de dados à variável numa string de conexão (todos os passos da interface do banco de dados em código)
            oConexao.ConnectionString = "Server=192.168.0.12; uid=Aluno2DS; pwd=SenhaBD2; Database=BANCO2DS";

            // executa a string de conexão
            oConexao.Open();

            // mostra que o banco foi aberto
            MessageBox.Show("Abrido");
        }

        private void cmdCategoria_Click(object sender, EventArgs e)
        {
            // cria um novo dialogo com frmCategoria
            new frmCategoria().ShowDialog();
        }
    }
}