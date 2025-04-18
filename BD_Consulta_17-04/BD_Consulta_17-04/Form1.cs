// importa o MySQL
using MySql.Data.MySqlClient;

namespace BD_Consulta_17_04
{
    public partial class Form1 : Form
    {
        // referencia o MySQL e cria uma vari�vel p�blica e est�tica (para aparecer em outros arquivos)
        static public MySqlConnection oConexao = new MySqlConnection();
        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            // atribui o servidor (localhost), o usu�rio, senha e banco de dados � vari�vel numa string de conex�o (todos os passos da interface do banco de dados em c�digo)
            oConexao.ConnectionString = "Server=192.168.0.12; uid=Aluno2DS; pwd=SenhaBD2; Database=BANCO2DS";

            // executa a string de conex�o
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